@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">変更画面</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!--                                        フォーム画面部分（開始）　                               -->
                    <div class="container">
                        <div class="row">
                            <div class= "col-md-6">
                                <form method="POST" action="{{ route('contact.update', ['id' => $contact->id]) }}">
                                @csrf
                                <!-- 氏名 -->
                                <div class ="form-group">
                                    <label for="your_name">氏名</label>
                                    <input type="text" class="form-control" id="your_name" name="your_name" value="{{ $contact->your_name }}">
                                </div>
                                <!-- 件名 -->
                                <div class ="form-group">
                                    <label for="title">件名</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $contact->title }}">
                                </div>
                                <!-- メールアドレス -->
                                <div class ="form-group">
                                    <label for="email">メールアドレス</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}" required>
                                </div>
                                 <!-- ホームページ -->
                                <div class ="form-group">
                                    <label for="url">ホームページ</label>
                                    <input type="url" class="form-control" id="url" name="url" value="{{ $contact->url }}">
                                </div>

                                <!-- 性別 -->
                                <div class="from-check form-check-inline" >
                                    性別
                                    <!-- 男性 -->
                                    <input type="radio" class="form-check-input" name="gender" value="0" @if($contact->gender === 0) checked @endif>
                                    <label class="form-check-label" for="gender0">男性</label>
                                    <!-- 女性 -->
                                    <input type="radio" class="form-check-input"　name="gender" value="1" @if($contact->gender === 1) checked @endif>
                                    <label class="form-check-label" for="gender1">女性</label>
                                </div>

                                <!-- 年齢 -->
                                <div class="form-group">
                                    <label for="age">年齢</label>
                                        <select class="form-control" id="age" name="age">

                                            <option value="">選択してください</option>
                                            <option value="1"　@if($contact->age === 1) selected @endif>~19歳</option>
                                            <option value="2"　@if($contact->age === 2) selected @endif>20歳~29歳</option>
                                            <option value="3"　@if($contact->age === 3) selected @endif>30歳~39歳</option>
                                            <option value="4"　@if($contact->age === 4) selected @endif>40歳~49歳</option>
                                            <option value="5"　@if($contact->age === 5) selected @endif>50歳~59歳</option>
                                            <option value="6"　@if($contact->age === 6) selected @endif>60歳~</option>

                                        </select>
                                </div>

                                <!-- お問合せ内容 -->
                                <div class="form-group">
                                    <label for="contact">お問合せ内容</label>
                                    <textarea class="form-control" id="contact" rows="3" name="contact">{{ $contact->contact }}</textarea>
                                </div>
                                {{-- 更新ボタン --}}
                                <input class="btn btn-info" type="submit" value="更新する">
                            </form>

                            <form method= "GET" action="{{route('contact.index')}}">
                                <!-- 戻るボタン -->
                                <input class="btn btn-primary" type="submit" value="戻る">
                            </form>
                            
                        </div> {{-- col-md-6 --}}
                    </div> {{-- row --}}
                </div> {{-- card-body --}}
                <!--                                        フォーム画面部分（終了）　                               -->
            </div>
        </div>
@endsection
