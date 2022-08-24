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
            <table class="table table-striped task-table">
            <!-- テーブルヘッダ -->
                {{-- <thead>
                    <th>投稿一覧</th>
                    <th> </th>
                </thead> --}}
            <!-- テーブル本体 -->
                <tbody>
                    @foreach ($posts as $post)
                    <div class="post-show">
                        <h4 class="card-text">{{ $post->user->name }}の投稿</h4>
                        <h5 class="card-title">タイトル：{{ $post->post_title }}</h5>
                        <p class="card-text">{{ $post->post_content }}</p>
                        <button type="submit" class="btn btn-primary">
                            Like
                        </button>
                        {{-- <span>
                            <!-- もし$niceがあれば＝ユーザーが「いいね」をしていたら -->
                            @if($nice)
                            <!-- 「いいね」取消用ボタンを表示 -->
                                <a href="{{ route('unnice', $post) }}" class="btn btn-success btn-sm">
                                    いいね
                                    <!-- 「いいね」の数を表示 -->
                                    <span class="badge">
                                        {{ $post->nices->count() }}
                                    </span>
                                </a>
                            @else
                            <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                                <a href="{{ route('nice', $post) }}" class="btn btn-secondary btn-sm">
                                    いいね
                                    <!-- 「いいね」の数を表示 -->
                                    <span class="badge">
                                        {{ $post->nices->count() }}
                                    </span>
                                </a>
                            @endif
                        </span> --}}
                    </div>
                    <br>
                    {{-- <tr>
                        <!-- 投稿タイトル -->
                        <td class="table-text">
                        <div>{{ $post->post_title }}</div>
                        </td>
                        <!-- 投稿詳細 -->
                        <td class="table-text">
                        <div>{{ $post->post_content }}</div>
                        </td>
                        <!-- 投稿者名の表示 -->
                        <td class="table-text">
                        <div>{{ $post->user->name }}</div>
                        </td>
                    </tr> --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection