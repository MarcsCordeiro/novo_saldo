<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Balance extends Model
{
    public $timestamps = false;

    public function deposit($value) : Array{

        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;   
        $this->amount += $value;
        $deposit = $this->save();

        $historic = auth()->user()->historics()->create([
            'type'          => 'I',
            'amount'        => $value,
            'total_before'  => $totalBefore,
            'total_after'   => $this->amount,
            'date'          => date('Ymd'),
        ]);

        if($deposit && $historic){
            DB::commit();

            return[
                'success' => true,
                'message' => 'Sucesso ao recarregar'
            ];
        }  else{
            DB::rollback();
            
            return[
                'success' => false,
                'message' => 'Falha ao recarregar'
            ];
        }

    }

    public function withdrawn($value) : Array{

        if($this->amount < $value)
            return [
                'success' => false,
                'message' => 'Saldo Insuficiente',
            ];
            
        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;   
        $this->amount -= $value;
        $withdrawn = $this->save();

        $historic = auth()->user()->historics()->create([
            'type'          => 'O',
            'amount'        => $value,
            'total_before'  => $totalBefore,
            'total_after'   => $this->amount,
            'date'          => date('Ymd'),
        ]);

        if($withdrawn && $historic){
            DB::commit();

            return[
                'success' => true,
                'message' => 'Sucesso ao retirar'
            ];
        }  else{
            DB::rollback();
            
            return[
                'success' => false,
                'message' => 'Falha ao retirar'
            ];
        }

    }
}
