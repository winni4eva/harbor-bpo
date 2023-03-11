<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
            return Company::collection(Company::where('id', $user->company_id)->get());
        }
        
        return Company::collection(Company::all());
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
        return Company::create(['name' => $request->name]);
    }
}
