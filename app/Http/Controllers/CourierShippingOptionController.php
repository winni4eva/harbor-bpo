<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourierShippingOptionResource;
use App\Models\CourierShippingOption;
use App\Models\User;
use Illuminate\Http\Request;

class CourierShippingOptionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $user = User::find(request()->userId);
        if ($user->role != 'Admin') {
            return CourierShippingOptionResource::collection(CourierShippingOption::where('company_id', $user->company_id)->get());
        }
        
        return CourierShippingOptionResource::collection(CourierShippingOption::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAccountRequest  $request
     * @return \App\Http\Resources\AccountResource
     */
    public function store(Request $request)
    {
        logger('Request' . $request->name);
        //$request->validated($request->all());

        // $account = Account::create([
        //     'user_id' => Auth::user()->id,
        //     'amount' => $request->amount
        // ]);

        //return new AccountResource($account);
        return CourierShippingOption::create([
            'name' => $request->name,
            'courier_id' => $request->courier_id
        ]);
    }
}
