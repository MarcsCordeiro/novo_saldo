@extends('site.layouts.app')

@section('title', 'Meu Perfil')

@section('content')
    <h1>Meu perfil</h1>

    @include('admin.includes.alerts')

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form form-group">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" value="{{ auth()->user()->name }}" name="name" class="form-control" >
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" value="{{ auth()->user()->email }}" name="email"  class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" class="form-control" >
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info">Atualizar perfil</button>
        </div>
        </div>
    
    </form>

@endsection