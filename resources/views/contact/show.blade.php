@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">登録データ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- 登録情報確認画面 --}}
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                              <th scope="col">id</th>
                              <th scope="col">氏名</th>
                              <th scope="col">件名</th>
                              <th scope="col">メールアドレス</th>
                              <th scope="col">ホームページ</th>
                              <th scope="col">性別</th>
                              <th scope="col">年齢</th>
                              <th scope="col">お問い合せ内容</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th>{{ $contact->id }}</th>
                            <td>{{ $contact->your_name }}</td>
                            <td>{{ $contact->title }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->url }}</td>
                            <td>{{ $gender }}</td>
                            <td>{{ $age }}</td>
                            <td>{{ $contact->contact }}</td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- 登録情報変更ボタン --}}
                    <form method="GET" action="{{ route('contact.edit', ['id' => $contact->id]) }}">
                        @csrf
                        <div class="buttun-edit">
                            <input class="btn btn-info" type="submit" value="変更する">
                        </div>
                    </form>
                    {{-- 変更ボタン微調整 --}}
                    <style>
                        .buttun-edit{
                           position: relative;
                           bottom: -35px;
                           right: 0px;
                        }
                    </style>

                    {{-- 登録情報削除ボタン --}}
                    <form method="POST" action="{{ route('contact.destroy', ['id' => $contact->id]) }}" id="delete_{{ $contact->id }}">
                    @csrf
                    <div class="text-right">
                    <a href="#" class="btn btn-danger" data-id="{{ $contact->id }}" onclick="deletePost(this);">削除する</a>
                    </div>
                    </form>

                    <form method= "GET" action="{{route('contact.index')}}">
                            <!-- 戻るボタン -->
                            <input class="btn btn-primary" type="submit" value="戻る">
                    </form>


                </div>      {{-- class "card-body" --}}

            </div>
        </div>
    </div>
</div>

{{-- 削除ボタン確認処理 --}}
<script>
    function deletePost(e){
        'use strict';
        if (confirm('本当に削除していいですか？')){
            document.getElementById('delete_' + e.dataset.id).submit();
        }
    }
</script>

@endsection
