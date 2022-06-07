@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">登録情報</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- 登録ボタン処理 --}}
                    <form method= "GET" action="{{ route('contact.create') }}">
                        <div class="text-right">   {{-- ボタン右寄せ --}}
                            <button type="submit" class="btn btn-primary">
                                新規登録
                            </button>
                        </div>
                    {{-- 登録ボタン微調整 --}}
                    <style>
                        .text-right{
                           position: relative;
                           top: 40px;
                           left: 10px;
                        }
                    </style>
                    </form>
                    {{-- 検索フォーム処理 --}}
                    <form method="GET" action="{{ route('contact.index') }}" class="form-inline">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="検索する" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索する</button>
                    </form>
                    {{-- 表示テーブル部分 --}}
                    <table class="table">
                    <thead class="thead-dark">
                        <tr>
                          <th scope="col">id</th>
                          <th scope="col">氏名</th>
                          <th scope="col">件名</th>
                          <th scope="col">登録日時</th>
                          <th scope="col">詳細</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                            <th>{{ $contact->id }}</th>
                            <td>{{ $contact->your_name }}</td>
                            <td>{{ $contact->title }}</td>
                            <td>{{ $contact->created_at}}</td>
                            <td><a href="{{ route('contact.show', ['id' => $contact->id]) }}">詳細をみる</a></td>
                        　　</tr>
                        @endforeach
                    </tbody>
                    </table>
                    {{--  --}}
                    {{ $contacts->links() }}

                    {{-- 絞り込み後のみ戻るボタン表示 --}}
                    @if($countColumnQuery > $countColumnQuery_after)
                        <form method= "GET" action="{{route('contact.index')}}">
                        <!-- 戻るボタン -->
                        <input class="btn btn-primary" type="submit" value="戻る">
                        </form>
                    @endif

                </div>　

            </div>
        </div>
    </div>
</div>
@endsection
