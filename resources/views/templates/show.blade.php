@extends('layouts.app')

@section('content')
    @if(count($templates) > 0)
        <table class="table table-striped">
            <tbody>
                @foreach ($templates as $templates)
                <div class="text-center">
                    <textarea id="copyTarget" type="text" cols="60" rows="20" placeholder="Type your text.">{{ $templates->content }}</textarea>
                </div>
                <div class="mb-3 text-right">
                    {!! Form::model($templates, ['route' => ['templates.destroy', $templates->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    <button onclick="copyToClipboard()" type="button" class="btn btn-info">Copy</button>
                </div>
                <div class="dropdown-divider"></div>
                @endforeach
            </tbody>
        </table>
    @else
        <h5 class="text-center">Please save your template on this previous page. (^^)/</h5>
        </table>
    @endif
@endsection