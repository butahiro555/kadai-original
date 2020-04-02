@extends('layouts.app')

@section('content')

    <h5 class="text-center">Password edit</h5>
    
    <div class="edit">
        {!! Form::model($user, ['route' => ['users.password_update', $user->id], 'method' => 'patch']) !!}
            {{ csrf_field() }}
        <table>
            <tr><th>{!! Form::label('password', 'New password') !!}</th></tr>
                <td>{!! Form::password('password', ['class' => 'form-control', 'size' => '30x1']) !!}</td>
        </table>
        <table>
            <tr><th>{!! Form::label('password_confirmation', 'Confirm new password') !!}</th></tr>
                <td>{!! Form::password('password_confirmation', ['class' => 'form-control', 'size' => '30x1']) !!}</td>
                <td>{!! Form::submit('Confirm', ['class' => 'btn btn-primary text-white']) !!}</td>
        </table>
        {!! Form::close() !!}
    </div>
@endsection