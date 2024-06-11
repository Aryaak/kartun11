<?php

namespace App\Http\Controllers;

use App\Models\Cashflow;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $cashflowIn = [];
        $cashflowOut = [];

        $cashflowIn[0] = Cashflow::whereMonth('created_at', 1)
            ->where('type', 'pemasukan')
            ->sum('nominal');
        $cashflowIn[1] = Cashflow::whereMonth('created_at', 2)
            ->where('type', 'pemasukan')
            ->sum('nominal');
        $cashflowIn[2] = Cashflow::whereMonth('created_at', 3)
            ->where('type', 'pemasukan')
            ->sum('nominal');
        $cashflowIn[3] = Cashflow::whereMonth('created_at', 4)
            ->where('type', 'pemasukan')
            ->sum('nominal');
        $cashflowIn[4] = Cashflow::whereMonth('created_at', 5)
            ->where('type', 'pemasukan')
            ->sum('nominal');
        $cashflowIn[5] = Cashflow::whereMonth('created_at', 6)
            ->where('type', 'pemasukan')
            ->sum('nominal');
        $cashflowIn[6] = Cashflow::whereMonth('created_at', 7)
            ->where('type', 'pemasukan')
            ->sum('nominal');
        $cashflowIn[7] = Cashflow::whereMonth('created_at', 8)
            ->where('type', 'pemasukan')
            ->sum('nominal');
        $cashflowIn[8] = Cashflow::whereMonth('created_at', 9)
            ->where('type', 'pemasukan')
            ->sum('nominal');
        $cashflowIn[9] = Cashflow::whereMonth('created_at', 10)
            ->where('type', 'pemasukan')
            ->sum('nominal');
        $cashflowIn[10] = Cashflow::whereMonth('created_at', 11)
            ->where('type', 'pemasukan')
            ->sum('nominal');
        $cashflowIn[11] = Cashflow::whereMonth('created_at', 12)
            ->where('type', 'pemasukan')
            ->sum('nominal');

        $cashflowOut[0] = Cashflow::whereMonth('created_at', 1)
            ->where('type', 'pengeluaran')
            ->sum('nominal');
        $cashflowOut[1] = Cashflow::whereMonth('created_at', 2)
            ->where('type', 'pengeluaran')
            ->sum('nominal');
        $cashflowOut[2] = Cashflow::whereMonth('created_at', 3)
            ->where('type', 'pengeluaran')
            ->sum('nominal');
        $cashflowOut[3] = Cashflow::whereMonth('created_at', 4)
            ->where('type', 'pengeluaran')
            ->sum('nominal');
        $cashflowOut[4] = Cashflow::whereMonth('created_at', 5)
            ->where('type', 'pengeluaran')
            ->sum('nominal');
        $cashflowOut[5] = Cashflow::whereMonth('created_at', 6)
            ->where('type', 'pengeluaran')
            ->sum('nominal');
        $cashflowOut[6] = Cashflow::whereMonth('created_at', 7)
            ->where('type', 'pengeluaran')
            ->sum('nominal');
        $cashflowOut[7] = Cashflow::whereMonth('created_at', 8)
            ->where('type', 'pengeluaran')
            ->sum('nominal');
        $cashflowOut[8] = Cashflow::whereMonth('created_at', 9)
            ->where('type', 'pengeluaran')
            ->sum('nominal');
        $cashflowOut[9] = Cashflow::whereMonth('created_at', 10)
            ->where('type', 'pengeluaran')
            ->sum('nominal');
        $cashflowOut[10] = Cashflow::whereMonth('created_at', 11)
            ->where('type', 'pengeluaran')
            ->sum('nominal');
        $cashflowOut[11] = Cashflow::whereMonth('created_at', 12)
            ->where('type', 'pengeluaran')
            ->sum('nominal');

        $cashflowInTotal = Cashflow::where('type', 'pemasukan')
            ->sum('nominal');
        $cashflowOutTotal = Cashflow::where('type', 'pengeluaran')
            ->sum('nominal');

        $totalCashflow = $cashflowInTotal + $cashflowOutTotal;

        if ($totalCashflow > 0) {
            $percentageIn = ($cashflowInTotal / $totalCashflow) * 100;

            $percentageOut = ($cashflowOutTotal / $totalCashflow) * 100;
        } else {
            $percentageIn = 0;
            $percentageOut = 0;
        }

        $projects = Project::latest()
            ->limit(5)
            ->get();

        return view('pages.dashboard', compact(
            'cashflowIn',
            'cashflowOut',
            'percentageIn',
            'percentageOut',
            'projects'
        ));
    }
}
