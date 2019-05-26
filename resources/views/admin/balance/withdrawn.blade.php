@extends('adminlte::page')

@section('title', 'ProjectSPD-Sacar')

@section('content_header')
    <h1>Nova recarga</h1>

    <ol class="breadcrumb">
        <li><a href="../">Home</a></li>
        <li><a href="../balance">Saldo</a></li>
        <li><a href="">Sacar</a></li>
    </ol>
@stop

@section('content')
<div class="box-container">
        <div class="box-header" >
            <h3>Fazer Retirada</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <form method="POST" action="{{ route('withdrawn.store') }}">
                {!! csrf_field() !!}

                <div class="form-group col-lg-8 col-sm-8">
                    <input type="text" name="value" placeholder="Valor Retirada" class="form-control"/>
                </div >
                    
                <div class="form-group col-lg-8 col-sm-8">
                    <button type="submit" class="btn btn-success">Sacar </button>
                </div>
            
            </form>
        </div>
    </div>
@stop