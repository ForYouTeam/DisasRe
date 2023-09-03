<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Flood;
use App\Models\Report;
use App\Models\Reporter;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        $data = [
            'banjir' => Flood::count(),
            'laporan' => Report::count(),
            'pelapor' => Reporter::count(),
            'akun' => User::count()
        ];
        $date = Carbon::now()->format('Y/m/d');
        return view('Backoffice.Dashboard')->with([
            'data' => $data,
            'date' => $date,
        ]);
    }
}
