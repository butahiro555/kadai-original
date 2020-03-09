@extends('layouts.app')

@section('content')
    <h5 class="text-center text-primary">Template create</h5>
            <!-- テンプレートを保存するためのフォームアクション -->
            {!! Form::model($templatess, ['route' => 'templates.store']) !!}
                {{ csrf_field() }}
                
                <!-- ログインユーザーと、非ログインユーザーのテキストエリア -->
                @if(Auth::check())
                <div class="container">
                    <div class="title">
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title', required]) !!}
                    </div>
                    <div class="textarea">
                        {!! Form::textarea('content', null, ['id' => 'copyTarget', 'type' => 'text', 'size' => '30x15', 'class' => 'form-control', 'placeholder' => 'Type your text.', required]) !!}
                @else
                        {!! Form::textarea('content', null, ['id' => 'copyTarget', 'type' => 'text', 'size' => '30x15', 'class' => 'form-control', 'placeholder' => 'If you login on this site, you can use function of create and save templates!', required]) !!}
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
            {!! Form::close() !!}
        </div>
@endsection