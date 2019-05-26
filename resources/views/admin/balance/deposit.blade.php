@extends('adminlte::page')

@section('title', 'ProjectSPD-Depositar')

@section('content_header')
    <h1>Nova recarga</h1>

    <ol class="breadcrumb">
        <li><a href="../">Home</a></li>
        <li><a href="../balance">Saldo</a></li>
        <li><a href="">Depositar</a></li>
    </ol>
@stop

@section('content')
<div class="box-container">
        <div class="box-header" >
            <h3>Fazer Recarga</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <form method="POST" action="{{ route('deposit.store') }}">
                {!! csrf_field() !!}

                <div class="form-group col-lg-8 col-sm-8">
                    <input type="text" name="value" placeholder="Valor Recarga" class="form-control"/>
                </div >
                    
                <div class="form-group col-lg-8 col-sm-8">
                    <button type="submit" class="btn btn-success">Recarregar </button>
                </div>
            
            </form>
        </div>
    </div>
@stop