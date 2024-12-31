<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Resources\UserResource;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

class UserController extends Controller
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

        $type = $request->type ?? 'All';
        $role = auth()->user()->roles[0]->name ?? null;

        $users = User::with('roles')
            ->select('users.id AS user_id', 'users.email AS user_email', 'users.name AS user_name', 'users.active AS active', 'roles.id AS role_id', 'roles.name AS role_name', 'roles.guard_name AS role_guard_name')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->when($request->search, function($query, $search) {
                $query->where('users.name', 'like', '%'.$search.'%')
                    ->orWhere('users.email', 'like', '%'.$search.'%')
                    ->orWhere('roles.name', 'like', '%'.$search.'%');
            })
            ->where(function($query) use ($type) {
                if($type != 'All') {
                    $query->where('users.active', ($type == 'Active' ? 1 : 0));
                }
            })
            ->where(function($query) use ($role) {
                if($role == 'admin' && !is_null($role)) {
                    $query->whereNotIn('roles.name', ['developer']);
                }
            })
            ->orderBy('roles.id')
            ->paginate(15)
            ->withQueryString();

        $filters = $request->only(['search', 'type']);
        
        return Inertia::render('Admin/Users/Index', compact('users', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Inertia::setRootView($this->layout);
        
        if(auth()->user()->hasRole('developer')) {
            $roles = Role::orderBy('name')->get();
        } else {
            $roles = Role::whereNotIn('name', ['admin', 'developer'])->orderBy('name')->get();
        }

        return Inertia::render('Admin/Users/Create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $role = Role::findById($request->role);
        
        $user = User::create($request->validated());
        $user->assignRole($role);

        return back();
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
        
        $user = new UserResource(User::with('roles', 'watchVideos')->findOrFail($id));

        return Inertia::render('Admin/Users/Show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Inertia::setRootView($this->layout);
        
        $user = User::with('roles')->findOrFail($id);

        // Fetch user roles
        if(auth()->user()->hasRole('developer')) {
            $roles = Role::orderBy('name')->get();
        } else {
            $roles = Role::whereNotIn('name', ['admin', 'developer'])->orderBy('name')->get();
        }

        return Inertia::render('Admin/Users/Edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $user = User::findOrFail($request->id);

        $user->update($request->validated());

        if($user->roles->pluck('id')->first() != $request->role) {
            $oldRole = Role::findById($user->roles->pluck('id')->first());
            $newRole = Role::findById($request->role);
            $user->removeRole($oldRole);
            $user->assignRole($newRole);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->active = !$user->active;
        $user->save();

        return back()->with(['active' => $user->active]);
    }
    
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
