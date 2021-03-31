<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $plans = Plan::with('details')->orderBy('price', 'asc')->get();

        return view('site.home.index', compact('plans'));
    }

    public function plan($id)
    {
        if (!$plan = Plan::find($id)) {
            return redirect()->back();
        }

        session()->put('plan', $plan);

        return redirect()->route('register');
    }
}
