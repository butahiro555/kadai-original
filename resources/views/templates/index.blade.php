@extends('layouts.app')

@section('content')
        <h5 class="text-center text-primary">Template create</h5>
            @if(Auth::check())
            <table class="search">
                {!! Form::open(['route' => 'search', 'method' => 'get']) !!}
                <td class="example1">{!! Form::text('keyword', null, ['class' => 'form-control', 'placeholder' => 'Search Templates title.']) !!}</td>
                <td>{!! Form::button('<i class="fas fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-success text-white']) !!}</td>
                {!! Form::close() !!}
            </table>
            @endif
            
            <!-- テンプレートを保存するためのフォームアクション -->
        <div class="top">
            {!! Form::model($templatess, ['route' => 'templates.store']) !!}
                {{ csrf_field() }}
            <div class="container">        
                <!-- ログインユーザーと、非ログインユーザーのテキストエリア -->
                @if(Auth::check())
                    <div class="title">
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                    </div>
                    <div class="textarea">
                        {!! Form::textarea('content', null, ['id' => 'copyTarget', 'type' => 'text', 'size' => '30x13', 'class' => 'form-control', 'placeholder' => 'Type your text.']) !!}
                    </div>
                
                @else
                    <div class="textarea">
                        {!! Form::textarea('content', null, ['id' => 'copyTarget', 'type' => 'text', 'size' => '30x13', 'class' => 'form-control', 'placeholder' => 'If you login on this site, you can use function of create and save templates!']) !!}
                    </div>
                @endif
                
                <!-- テンプレートを保存するボタンと、クリップボードにコピーするボタン -->
                <div class="wrapper">
                    @if(Auth::check())
                    <div class="wrapper-button">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    </div>
                    @endif
                    <div class="wrapper-button">
                        {!! Form::button('Copy', ['onclick' => 'copyToClipboard()', 'class' => 'btn btn-info']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
@endsection