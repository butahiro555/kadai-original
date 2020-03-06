@extends('layouts.app')

@section('content')
            <h5 class="text-center text-primary">Template create</h5>
        <form action="{{ url('/templates')}}" method="post">
            {{ csrf_field() }}
            
            <div class="text-center">
                @if(Auth::check())
                <textarea id="copyTarget" type="text" name="content" cols="60" rows="20" placeholder="Type your text." required></textarea>
                @else
                <textarea id="copyTarget" type="text" name="content" cols="60" rows="20" placeholder="If you login on this site,
you can use function of create and save templates!" required></textarea>
                @endif
            </div>
            <div class="text-right">
                @if(Auth::check())
                <button onclick="saveToTemplatelist()" type="submit" class="btn btn-primary btn">Save</button>
                @endif
                <button onclick="copyToClipboard()" type="button" class="btn btn-info">Copy</button>
            </div>
        </form>
@endsection