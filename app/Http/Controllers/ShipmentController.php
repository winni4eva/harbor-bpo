<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShipmentResource;
use App\Models\Shipment;
use App\Models\User;
use Illuminate\Http\Request;

class ShipmentController extends Controller
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
            return ShipmentResource::collection(Shipment::where('user_id', $user->id)->get());
        }
        
        return ShipmentResource::collection(Shipment::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAccountRequest  $request
     * @return \App\Http\Resources\AccountResource
     */
    public function store(Request $request)
    {
        logger('Request ', $request->all());
        //$request->validated($request->all());

        // $account = Account::create([
        //     'user_id' => Auth::user()->id,
        //     'amount' => $request->amount
        // ]);

        //return new AccountResource($account);
        return Shipment::create([
            'user_id' => $request->userId,
            'courier_id' => $request->courier_id,
            'courier_shipping_option_id' => $request->courier_shipping_option_id,
            'weight' => $request->weight,
            'size' => $request->length .' x '. $request->breadth,
            'tracking' => mt_rand(1000000, 9000000)
        ]);
    }
}
