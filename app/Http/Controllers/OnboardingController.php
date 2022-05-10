<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnboardingController extends Controller
{
    public function index()
    {
        if (!auth()->user()->onboarding_completed) {
            return view('onboarding.index');
        } else {
            toast()->info('You have already completed onboarding!')->push();
            return redirect(route('dashboard'));
        }
    }
}
