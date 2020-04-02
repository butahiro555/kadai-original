@extends('layouts.app')

@section('content')

    <h5 class="text-center">User profile</h5>
    <div class="user">
        <div class="user-info">
        <table class="mb-3">
                <tr><th>{!! Form::label('name', 'User name') !!}</th></tr>
                <td>{{ $user->name }}</td>
        </table>
        <table class="mb-3">
                <tr><th>{!! Form::label('mail', 'E-mail') !!}</th></tr>
                <td>{{ $user->email }}</td>
        </table>
        <table>
                <tr><th>{!! Form::label('password', 'Password') !!}</th></tr>
                <td>&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;</td>
        </table>
        </div>
        
        <div class="user-button">
            <div class="user-button-name">
            {!! Form::open(['url' => '/name', 'method' => 'get']) !!}
                {!! Form::button('<i class="fas fa-pen"></i>', ['type' => 'submit', 'class' => 'btn btn-success text-white']) !!}
            {!! Form::close() !!}
            </div>
            <div class="user-button-mail">
            {!! Form::open(['url' => '/mail', 'method' => 'get']) !!}
                {!! Form::button('<i class="fas fa-pen"></i>', ['type' => 'submit', 'class' => 'btn btn-success text-white']) !!}</td>
            {!! Form::close() !!}
            </div>
            <div class="user-button-password">
            {!! Form::open(['url' => '/password/current', 'method' => 'get']) !!}
                {!! Form::button('<i class="fas fa-pen"></i>', ['type' => 'submit', 'class' => 'btn btn-success text-white']) !!}
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection