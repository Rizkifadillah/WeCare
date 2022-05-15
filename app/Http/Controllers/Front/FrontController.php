<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
        $donatur = User::whereHas('donations')->count();
        $misiSukses = Campaign::whereHas('cashouts')->count();
        $relawan = User::whereHas('campaigns')->count();
        $projek = Campaign::where('status', 'public')->count();

        $campaign = Campaign::where('status', 'public')
            ->orderBy('publish_date', 'desc')
            ->limit(6)
            ->get();

        return view('front.welcome', compact('campaign', 'donatur', 'misiSukses', 'relawan', 'projek'));
    }
}
