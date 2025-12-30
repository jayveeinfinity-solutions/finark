<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Partner;
use App\Models\PartnerGroups;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\PartnerGroupReferences;

class ExtranetController extends Controller
{
    public function landing() {
        $groups = PartnerGroups::where('active', 1)->orderBy('sequence')->get();
        $partner_group_references = PartnerGroupReferences::select(DB::raw('partner_group_id AS id, COUNT(*) AS count'))->groupBy('partner_group_id')->get();
        
        $data = [];
        $i = 0;
        foreach($groups as $group) {
            $temp = [];
            $temp['id'] = $group->id;
            $temp['name'] = $group->name;
            $temp['icon'] = $group->icon;
            $temp['sequence'] = ($i < 3 ? $i : ($i + 1)) + 1;
            $temp['lg'] = $i < 3 ? TRUE : FALSE;
            $temp['col'] = $i < 4 ? 1 : 2;

            foreach($partner_group_references as $pgr) {
                if($group->id == $pgr->id) {
                    $temp['count'] = $pgr->count;
                    break;
                }
            }
            $i++;
            $data[] = $temp;
        }

        $data[] = [
            'id' => 0,
            'name' => "Bank Partners",
            'icon' => $data[3]['icon'],
            'sequence' => 4,
            'count' => $data[3]['count'] + $data[4]['count'],
            'lg' => FALSE,
            'col' => 0
        ];

        usort($data, fn($x, $y) => $x['sequence'] <=> $y['sequence']);

        return Inertia::render('Landing', [
            'groups' => $data
        ]);
    }

    public function about() {
        return Inertia::render('About');
    }

    public function services() {
        return Inertia::render('Services');
    }

    public function service(string $slug) {
        $dateToday = Carbon::now()->addDays(1);

        if($dateToday->isSaturday()) {
            $dateToday->addDays(2);
        }
        if($dateToday->isSunday()) {
            $dateToday->addDays(1);
        }

        return Inertia::render('Service', [
            'service' => $slug,
            'minDate' => $dateToday->format('Y-m-d')
        ]);
    }

    public function events() {
        return Inertia::render('Events');
    }

    public function blogs() {
        return Inertia::render('Blogs');
    }

    public function careers() {
        return Inertia::render('Careers');
    }

    public function contacts() {
        return Inertia::render('Contact');
    }

    public function partnets() {
        $groups = PartnerGroups::where('active', 1)->orderBy('sequence')->get();
        $partners = Partner::where('active', 1)->orderBy('name')->get();

        $groups = $groups->map(function($group) {
            return [
                'id' => $group->id,
                'name' => $group->name,
                'isActive' => false
            ];
        });

        $partners = $partners->map(function($partner) {
            $partner_group_references = PartnerGroupReferences::select('partner_group_id')->where('partner_id', $partner->id)->get();
            $groups = [];
            foreach($partner_group_references as $pgr) {
                $groups[] = $pgr->partner_group_id;
            }

            return [
                'id' => $partner->id,
                'name' => $partner->name,
                'logo' => $partner->web_logo,
                'url' => $partner->web_url,
                'groups' => implode(',', $groups)
            ];
        });

        return Inertia::render('Partners', [
            'groups' => $groups,
            'partners' => $partners
        ]);
    }
}
