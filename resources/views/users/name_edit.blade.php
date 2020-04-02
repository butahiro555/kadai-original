@extends('layouts.app')

@section('content')

    <h5 class="text-center">User name edit</h5>
    
    <div class="edit">
        <table>
            <tr><th>{!! Form::label('name', 'User name') !!}</th></tr>
            {!! Form::model($user, ['route' => ['users.name_update', $user->id], 'method' => 'patch']) !!}
            {{ csrf_field() }}
                <td>{!! Form::text('name', null, ['class' => 'form-control', 'size' => '30x1', 'placeholder' => 'name']) !!}</td>
                <td>{!! Form::submit('Update', ['class' => 'btn btn-warning text-white']) !!}</td>
            {!! Form::close() !!}
        </table>
    </div>
@endsection