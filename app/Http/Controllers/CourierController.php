<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourierResource;
use App\Models\Courier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourierController extends Controller
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
            return CourierResource::collection(Courier::where('company_id', $user->company_id)->get());
        }
        
        return CourierResource::collection(Courier::all());
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
