@extends('adminlte::page')

@section('title', 'ProjectSPD-Transferir-Confirmação')

@section('content_header')
    <h1>Confirmar Transferência</h1>

    <ol class="breadcrumb">
        <li><a href="../">Home</a></li>
        <li><a href="../balance">Saldo</a></li>
        <li><a href="">Tranferir</a></li>
        <li><a href="">Confirmação</a></li>
    </ol>
@stop

@section('content')
<div class="box-container">
        <div class="box-header" >
            <h3>Confirmar transferência</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <form method="POST" action="{{ route('confirm.transfer') }}">
                {!! csrf_field() !!}

            <p class="form-group col-lg-8 col-sm-8"><strong>Recebedor:  </strong>{{ $info->name }}</p>
            <p class="form-group col-lg-8 col-sm-8"><strong>Seu Saldo Atual:  </strong>{{number_format($balance->amount, 2, ',', '' ) }}</p>

            

                <input type="hidden" name="info_id" value="{{ $info->id }}"/>

                <div class="form-group col-lg-8 col-sm-8">
                    <input type="text" name="value" placeholder="Valor" class="form-control"/>
                </div >
                    
                <div class="form-group col-lg-8 col-sm-8">
                    <button type="submit" class="btn btn-success">Próxima Etapa</button>
                </div>
            
            </form>
        </div>
    </div>
@stop