@extends('layouts.app')

@section('content')

    <h5 class="text-center">E-mail edit</h5>
    
    <div class="edit">
        <table>
            <tr><th>{!! Form::label('mail', 'E-mail') !!}</th></tr>
            {!! Form::model($user, ['route' => ['users.mail_update', $user->id], 'method' => 'patch']) !!}
            {{ csrf_field() }}
                <td>{!! Form::text('email', null, ['class' => 'form-control', 'size' => '30x1', 'placeholder' => 'E-mail']) !!}</td>
                <td>{!! Form::submit('Update', ['class' => 'btn btn-warning text-white']) !!}</td>
            {!! Form::close() !!}
        </table>
    </div>
@endsection