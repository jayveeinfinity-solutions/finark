<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Client;
use App\Helpers\Helper;
use Carbon\CarbonPeriod;
use App\Models\Appointment;
use App\Models\ServicePlan;
use Illuminate\Http\Request;
use App\Http\Resources\AppointmentResource;

class AppointmentController extends Controller
{
    protected $layout = 'corporate-ui';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Inertia::setRootView($this->layout);

        $appointmentsCollection = Appointment::all();
        
        $appointmentsCount = $appointmentsCollection->count() ?? 0;
        $todayAppointmentsCount = $appointmentsCollection->where('appointment_date', Carbon::now()->format('Y-m-d'))->count() ?? 0;
        
        $pendingCount = $appointmentsCollection->filter(
            function($appointment) {
                return $appointment->status === "Pending";
            }
        )->count() ?? 0;

        $completedCount = $appointmentsCollection->where('status', "Completed")->count() ?? 0;

        $type = $request->type ?? 'All';

        $appointments = Appointment::query()
            ->when($request->search, function($query, $search) {
                $query->whereHas('clients', function($query) use ($search) {
                    $query
                        ->where('name', 'like', '%'.$search.'%')
                        ->orWhere('email', 'like', '%'.$search.'%');
                });
            })
            ->where(function($query) use ($type) {
                if($type != 'All') {
                    $query->where('status', $type);
                }
            })
            ->where('appointment_date', Carbon::now()->format('Y-m-d'))
            ->orderBy('appointment_date')
            ->orderBy('appointment_time')
            ->paginate(15)
            ->withQueryString()
            ->through(fn($appointment) => [
                'id' => $appointment->id,
                'client' => $appointment->clients,
                'service_plan' => $appointment->service_plans,
                'appointment_date' => $appointment->appointment_date,
                'appointment_time' => Helper::meetingTime($appointment->appointment_time),
                'status' => $appointment->status,
                'user' => $appointment->users,
            ]);

        $filters = $request->only(['search', 'type']);

        return Inertia::render('Admin/Appointments/Index',
            compact('appointmentsCount', 'todayAppointmentsCount', 'pendingCount', 'completedCount', 'appointments', 'filters')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = $request->date;
        $time = Carbon::createFromFormat('H', $request->time)->format('H:i:s');

        if($this->validateDate(Carbon::now()->addDays(1)->format('Y-m-d'), $date)) {
            return response()->json([
                'status' => "error",
                'title' => "Invalid apppointment date!",
                'text' => "Appointment date must be greater than " . Carbon::now()->format('F j, Y')
            ]);
        }
        $appointments = Appointment::where([
            'appointment_date' => $date,
            'appointment_time' => $time
        ])->count();
        if($appointments > 0) {
            return response()->json([
                'status' => "error",
                'title' => "Apppointment already booked!",
                'text' => "Chosen appointment date and time already booked to other users!"
            ]);
        }
        
        $client_id = Client::where('email', $request->email)->first()->id ?? FALSE;
        if(!$client_id) {
            $client = new Client;
            $client->name = $request->name;
            $client->email = $request->email;
            $client->save();

            // Get client id
            $client_id = $client->id;
        }

        // Get service plan id
        $service_plan_id = ServicePlan::where('slug', $request->service_plan)->first()->id;
        
        $appointment = new Appointment;
        $appointment->client_id = $client_id;
        $appointment->service_plan_id = $service_plan_id;
        $appointment->appointment_date = $date;
        $appointment->appointment_time = $time;
        $appointment->save();

        return response()->json([
            'status' => "success",
            'title' => "Appointment booked!",
            'text' => "You will receive an email once your appointment is confirmed!"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Inertia::setRootView($this->layout);

        $appointment = new AppointmentResource(Appointment::with('clients', 'service_plans', 'users')->findOrFail($id));

        return Inertia::render('Admin/Appointments/Show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function validateDate($minDate, $inputDate) {
        $minDate = Carbon::parse($minDate);
        $inputDate = Carbon::parse($inputDate);
        
        return $minDate->gt($inputDate) ? TRUE : FALSE;
    }

    public function getAvailableTimeSlots(Request $request) {
        // Get date selected from input
        $date = $request->date;

        if($this->validateDate(Carbon::now()->addDays(1)->format('Y-m-d'), $date)) {
            return response()->json([
                'status' => "error",
                'message' => "Appointment date must be greater than " . Carbon::now()->format('F j, Y'),
                'timeSlots' => []
            ]);
        }

        // Get already booked time slots for selected date convert to array
        $appointments = Appointment::select('appointment_time')->where('appointment_date', $date)->get()->toArray();
        $bookedAppointments = array_column($appointments, 'appointment_time'); // Merge multidimensional array to single array

        // Create period from 10am to 7pm
        $period = new CarbonPeriod('10:00', '1 hour', '18:00');
        $slots = [];
        foreach($period as $item) {
            $slots[$item->format("H")]['isBooked'] = in_array($item->format("H:i:s"), $bookedAppointments);
            $slots[$item->format("H")]['time'] = $item->format("h:i A") . ' - ' . $item->addHours(1)->format("h:i A");
        }
        
        return response()->json([
            'status' => "success",
            'timeSlots' => $slots
        ]);
    }
}
