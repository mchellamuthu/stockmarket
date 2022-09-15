<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\History;
use App\Models\CurrentData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

class HomeController extends Controller
{
    public function index()
    {
        $tickers = CurrentData::get();
        $tickers->append(['pv_close']);

        return Inertia::render('Dashboard', [
            'tickers' => $tickers
        ]);
    }

    public function history($ticker)
    {
        $data = History::where('ticker', $ticker)->orderBy('date', 'desc')->get();
        return Inertia::render('History', [
            'tickers' => $data
        ]);
    }
}
