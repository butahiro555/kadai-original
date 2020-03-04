@extends('layouts.app')

@section('content')
        <form action="{{ url('/templates')}}" method="post">
            {{ csrf_field() }}
            
            <div class="text-center">
                <textarea id="copyTarget" type="text" name="content" cols="60" rows="20" placeholder="Type your text." required></textarea>
            </div>
            <div class="text-right">
                @if(Auth::check())
                <button onclick="saveToTemplatelist()" type="submit" class="btn btn-primary btn">Save</button>
                @endif
                <button onclick="copyToClipboard()" type="button" class="btn btn-info">Copy</button>
            </div>
        </form>
@endsection