<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function create(Request $request)
    {
        $request->user()->newSubscription('default', 'plan_id')->create($request->paymentMethod);
        
        return redirect('/home')->with('success', 'Subscription created successfully.');
    }
}
