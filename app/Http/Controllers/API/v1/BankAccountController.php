<?php

namespace App\Http\Controllers\API\v1;

use App\Models\BankAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q=$request->query('q');
        $dpw=$request->query('dpw');
        $dpd=$request->query('dpd');

        $bankAccounts = BankAccount::with('bank_account_owner')->select(DB::raw("*,concat(name,' | ',bank_name,' | ', account_number) as custom_name"));
        if(!empty(trim($q))){

            $bankAccounts->where(function($querySearch)use($q){
               $querySearch->where('name','LIKE','%'.$q.'%')->orWhere('bank_name','LIKE','%'.$q.'%')->orWhere('account_number','LIKE','%'.$q.'%'); 
            });
            if($dpw){
                $province = \App\Models\Province::findOrFail($dpw);
                $bankAccounts->whereHasMorph('bank_account_owner','App\Models\Province', function($query)use($province){
                    $query->where('provinces.id',$province->id);
                });
            }else if($dpd){
                $city = \App\Models\City::findOrFail($dpd);
                $bankAccounts->whereHasMorph('bank_account_owner','App\Models\City', function($query)use($city){
                    $query->where('cities.id',$city->id);
                });
            }
            return $bankAccounts->get();
        }
        if($dpw){
            $province = \App\Models\Province::findOrFail($dpw);
            $bankAccounts->whereHasMorph('bank_account_owner','App\Models\Province', function($query)use($province){
                $query->where('provinces.id',$province->id);
            });
            return $bankAccounts->get();
        }else if($dpd){
            $city = \App\Models\City::findOrFail($dpd);
            $bankAccounts->whereHasMorph('bank_account_owner','App\Models\City', function($query)use($city){
                $query->where('cities.id',$city->id);
            });
            return $bankAccounts->get();
        }
        return $bankAccounts->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function show(BankAccount $bankAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankAccount $bankAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankAccount $bankAccount)
    {
        //
    }
}
