@extends('adminlte::page')

@section('title', 'ProjectSPD-Saldo')

@section('content_header')
    <h1>Saldo</h1>

    <ol class="breadcrumb">
        <li><a href="../">Home</a></li>
        <li><a href="">Saldo</a></li>
    </ol>
@stop

@section('content')
    <div class="box-container">
        <div class="box-header" >
            <a href="{{ route('balance.deposit') }}" class="btn  btn-social btn-primary" >
            <i class="fa fa-arrow-circle-down"></i> Recarregar
                </a>
            @if($amount > 0)    
            <a href="{{ route('balance.withdrawn') }}" class="btn  btn-social btn-danger">
            <i class="fa fa-arrow-circle-up"></i> Sacar
                </a>
            @endif 
            @if($amount > 0)    
            <a href="{{ route('balance.transfer') }}" class="btn  btn-social btn-warning">
            <i class="fa fa-exchange"></i> Transferir
                </a>
            @endif    
        </div>
        <div class="box-body">
        @include('admin.includes.alerts')
            
            <div class="small-box bg-green">
                <div class="inner">
                <h3>R$ {{ number_format($amount, 2, ',', ' ') }}</h3>

                </div>
                <div class="icon">
                <i class="ion ion-cash"></i>
                </div>
                <a href="#" class="small-box-footer">Historico <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            
        </div>
    </div>
@stop