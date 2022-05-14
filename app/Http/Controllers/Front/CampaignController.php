<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CampaignController extends Controller
{
    public function index()
    {
        // $category = Category::orderby('name')->get()->pluck('name', 'id');

        // return view('campaign.index', \compact('category'));
        return \redirect('/campaign/create');
    }

    public function create()
    {
        $category = Category::orderby('name')->get()->pluck('name', 'id');

        return view('front.campaign.index', \compact('category'));
    }

    public function edit($id)
    {
        $category = Category::orderby('name')->get()->pluck('name', 'id');
        $campaign = Campaign::findOrFail($id);

        return view('front.campaign.index', \compact('category', 'campaign'));
    }
}
