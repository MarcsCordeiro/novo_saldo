@extends('adminlte::page')

@section('title', 'ProjectSPD-Transferir')

@section('content_header')
    <h1>Transferência</h1>

    <ol class="breadcrumb">
        <li><a href="../">Home</a></li>
        <li><a href="../balance">Saldo</a></li>
        <li><a href="">Tranferir</a></li>
    </ol>
@stop

@section('content')
<div class="box-container">
        <div class="box-header" >
            <h3>Transferir Saldo(Informe o recebidor)</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <form method="POST" action="{{ route('transfer.store') }}">
                {!! csrf_field() !!}

                <div class="form-group col-lg-8 col-sm-8">
                    <input type="text" name="info" placeholder="Informação de quem vai receber o saque" class="form-control"/>
                </div >
                    
                <div class="form-group col-lg-8 col-sm-8">
                    <button type="submit" class="btn btn-success">Próxima Etapa</button>
                </div>
            
            </form>
        </div>
    </div>
@stop