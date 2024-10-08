<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ]);
        Subscription::create([
            'email' => $request->email,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->back()->with('success', 'Thank you for subscribing!');
    }
}
