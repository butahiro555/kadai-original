@extends('layouts.app')

@section('content')

    <h5 class="text-center">Password edit</h5>
    
    <div class="edit">
        <table>
            <tr><th>{!! Form::label('password', 'Current password') !!}</th></tr>
            {!! Form::model($user, ['route' => ['users.password_new', $user->id], 'method' => 'post']) !!}
            {{ csrf_field() }}
                <td>{!! Form::password('password', ['class' => 'form-control', 'size' => '30x1']) !!}</td>
                <td>{!! Form::submit('Confirm', ['class' => 'btn btn-primary text-white']) !!}</td>
            {!! Form::close() !!}
        </table>
    </div>
@endsection