@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card-form">
        <div class="card-title">
        投稿フォーム
        </div>
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- 投稿フォーム -->
            @if( Auth::check() )
                <form action="{{ url('posts') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <!-- 投稿のタイトル -->
                    <div class="form-group">
                        Title
                        <div class="col-sm-6">
                            <input type="text" name="post_title" class="form-control" placeholder="Enter title">
                        </div>
                    </div>
                    <!-- 投稿の本文 -->
                    <div class="form-group">
                        Body
                        <div class="col-sm-6">
                            {{-- <input type="text-box" name="post_content" class="form-control"> --}}
                            <textarea id="body" name="post_content" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <!--　登録ボタン -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">
                            Submit
                            </button>
                        </div>
                    </div>
                </form>
            @endif
    </div>
    <!-- 全ての投稿リスト -->
    @if (count($posts) > 0)
    <div class="card-body">
        <div class="card-box">
            
            @foreach ($posts as $post)
            <div class="post-show">
                <h4 class="card-text">{{ $post->user->name }}の投稿</h4>
                <h5 class="card-title">タイトル：{{ $post->post_title }}</h5>
                <p class="card-text">{{ $post->post_content }}</p>
                <p> いいね数： {{ count($post->nices) }} </p>
                @if($post->nices()->where('user_id', Auth::user()->id)->exists())
                <form action="/posts/{{$post->id}}/unnice" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">いいねを取り消す</button>
                </form>
                @else
                <form action="/posts/{{$post->id}}/nice" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">いいね</button>
                </form>
                @endif
                
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection