<?php

namespace App\Http\Controllers\Web;

use App\ChecksheetStatus;
use App\Http\Controllers\Controller;
use App\Models\Assignments;
use App\Models\Checksheet_Master;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $assignments_statuses = Checksheet_Master::select('status', DB::raw('count(*) as count'))
                                ->where('tanggal_inspeksi', '=', date("Y-m-d"))
                                ->groupBy('status')
                                ->get()
                                ->pluck('count', 'status')
                                ->toArray();
        $count_assignments = [
            'Total' => count($assignments_statuses)
        ];
        foreach(ChecksheetStatus::cases() as $status){
            $count_assignments[$status->value] = $assignments_statuses[$status->value] ?? 0;
        }

        $count_train = Assignments::count();
        $count_user = User::count();

        return view('pages.dashboard')->with([
            'count_train' => $count_train,
            'count_assignments' => $count_assignments,
            'count_user' => $count_user,
        ]);
    }
}
