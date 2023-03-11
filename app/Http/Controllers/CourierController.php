<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return Courier::all();
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
        return Courier::create([
            'name' => $request->name,
            'company_id' => $request->company_id
        ]);
    }
}
