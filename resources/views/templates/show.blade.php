@extends('layouts.app')

@section('content')
    @if(count($templates) > 0)
        <h5 class="text-center text-danger">Template list</h5>
    <div class="above">
        <div class="above-serach">
            {!! Form::open(['route' => 'search', 'method' => 'get']) !!}
                {!! Form::text('keyword', null, ['class' => 'form-control', 'placeholder' => 'Search title.', required]) !!}
                {!! Form::submit('Search', ['class' => 'btn btn-success text-white']) !!}
            {!! Form::close() !!}
        </div>
        
        <div class="above-sort">
            <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort</button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                <li><button class="dropdown-item" type="button">@sortablelink('created_at', 'create_date')</li>
                <div class="dropdown-divider"></div>
                <li><button class="dropdown-item" type="button">@sortablelink('updated_at', 'update_date')</li>
            </ul>
        </div>
    </div>
        
        <!-- テンプレートを繰り返し表示する -->
        @foreach ($templates as $template)
                            
            <!-- 更新のフォームアクション -->
            {!! Form::model($template, ['route' => ['templates.update', $template->id], 'method' => 'put']) !!}
            {{ csrf_field() }}
                <!-- テキストエリア -->
            <div class="container">
                    <div class="title">
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title', required]) !!}
                    </div>
                    
                    <div class="textarea">
                        {!! Form::textarea('content', null, ['id' => 'copyTarget', 'type' => 'text', 'size' => '30x15', 'class' => 'form-control', 'placeholder' => 'Type your text.', required]) !!}
                    </div>
                        
                <!-- 3つのボタンのためのflex box -->        
                <div class="flex_test-box">
                            <div class="flex_test-item">
                            <!-- 更新ボタン -->
                            {!! Form::submit('Update', ['id' => 'warning', 'class' => 'btn btn-warning text-white']) !!}
                            </div>
                    {!! Form::close() !!}
                        
                    <!-- 削除のフォーム -->
                    {!! Form::model($template, ['route' => ['templates.destroy', $template->id], 'method' => 'delete']) !!}
                        <!-- 削除ボタン-->
                            <div class="flex_test-item">
                            {!! Form::submit('Delete', ['id' => 'delete', 'class' => 'btn btn-danger']) !!}
                            </div>
                    {!! Form::close() !!}
                        
                        <!-- クリップボードにコピーするボタン -->
                            <div class="flex_test-item">
                            {!! Form::button('Copy', ['onclick' => 'copyToClipboard()', 'class' => 'btn btn-info']) !!}
                            </div>
                </div>
            
                    <!-- テンプレート間の仕切り -->
                    <div class="dropdown-divider"></div>
            </div>
        @endforeach
                
                        <!-- ページネーション -->
                        <!-- resources\views\vendor\pagination\bootstrap-4.blade.phpで、中央寄せをしている -->
                            {{ $templates->links('pagination::bootstrap-4') }}
    @else
        <h5 class="mt-5 text-center">Template is not found.</h5>
    @endif
@endsection