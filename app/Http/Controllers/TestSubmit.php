<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\News;
use Illuminate\Http\Request;


class TestSubmit extends Controller
{
    public function index(){
        $bankAccounts = BankAccount::all();

        return view('submitForm', ['bankAccounts' => $bankAccounts]);
    }

    public function submit(Request $request){

        dd($request->add_permission);
        return view('submitForm');
    }
}
