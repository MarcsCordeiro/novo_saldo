<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;
use App\User;

class BalanceController extends Controller
{

    public function index(){

        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0;

        return view('admin.balance.index', compact('amount'));
    }

    public function deposit(){
        return view('admin.balance.deposit');
    }

    public function depositStore(MoneyValidationFormRequest $request, Balance $balance)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->deposit($request->value);

        if($response['success'])
            return redirect()->route('admin.balance')->with('success', $response['message']);
        
            return redirect()->back()->with('error', $response['message']);
    }

    public function withdrawn(){
        return view('admin.balance.withdrawn');
    }

    public function withdrawnStore(MoneyValidationFormRequest $request, Balance $balance)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->withdrawn($request->value);

        if($response['success'])
            return redirect()->route('admin.balance')->with('success', $response['message']);
        
            return redirect()->back()->with('error', $response['message']);
    }

    public function transfer(){
        return view('admin.balance.transfer');
    }

    public function transferStore(Request $request,User $user){
        
        if(!$info = $user->getInfo($request->info))
        return redirect()->back()->with('error', 'Usuario informado não encontrado!');

        if($info->id === auth()->user()->id)
        return redirect()->back()->with('error', 'Você nao pode transferir para você mesmo!');


        return view('admin.balance.transfer-confirm', compact('info'));
    }

    public function confirmTranfer(Request $request){

    }
}
