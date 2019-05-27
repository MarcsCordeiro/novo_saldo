<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Historic;
use App\Http\Requests\MoneyValidationFormRequest;
use App\User;

class BalanceController extends Controller
{
    private $totalPage = 2;

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

        $balance = auth()->user()->balance;

        return view('admin.balance.transfer-confirm', compact('info', 'balance'));
    }

    public function confirmTranfer(MoneyValidationFormRequest $request,User $user){

        if(!$info = $user->find($request->info_id))
        return redirect()->route('balance.transfer')->with('success', 'Recebedor não encontrado!');

        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->transfer($request->value, $info);

        if($response['success'])
            return redirect()->route('admin.balance')->with('success', $response['message']);
        
            return redirect()->route('balance.transfer')->with('error', $response['message']); 
    }

    public function historic(Historic $historic){

        $historics = auth()->user()->historics()->with(['userInfo'])->paginate($this->totalPage);

        $types = $historic->type();

        return view('admin.balance.historics', compact('historics', 'types'));
    }

    public function searchHistoric(Request $request, Historic $historic){
        $dataForm = $request->all();

        $historics = $historic->search($dataForm, $this->totalPage);

        $types = $historic->type();

        return view('admin.balance.historics', compact('historics', 'types'));
    }
}
