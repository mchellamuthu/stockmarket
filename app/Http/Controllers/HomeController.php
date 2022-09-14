<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\CurrentData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

class HomeController extends Controller
{
    public function index()
    {
        $tickers = CurrentData::get();

        return Inertia::render('Dashboard', [
            'tickers' => $tickers
        ]);
    }
}
