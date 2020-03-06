@extends('layouts.app')

@section('content')
    @if(count($templates) > 0)
        <h5 class="text-center text-danger">Template list</h5>
        <table class>
            <tbody>
                @foreach ($templates as $template)
                <div class="text-center">
                    <textarea id="copyTarget" type="text" cols="60" rows="20" placeholder="Type your text.">{{ $template->content }}</textarea>
                </div>
                <div class="mb-3 text-right">
                    {!! Form::model($template, ['route' => ['templates.destroy', $template->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    <button onclick="copyToClipboard()" type="button" class="btn btn-info">Copy</button>
                </div>
                <div class="dropdown-divider"></div>
                @endforeach
                <div class="justify-content-end" id="paginationNav4">
                        {{ $templates->links('pagination::bootstrap-4') }}
                </div>
            </tbody>
        </table>
    @else
        <h5 class="mt-5 text-center">Please save your template on Templates create page. (^^)</h5>
        </table>
    @endif
@endsection