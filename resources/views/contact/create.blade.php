@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">登録画面</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- フォーム画面部分（開始） --}}
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <form method= "POST" action="{{route('contact.store')}}">
                                    @csrf
                                    <!-- 氏名 -->
                                    <div class ="form-group">
                                        <label for="your_name">氏名</label>
                                        <input type="text" class="form-control" id="your_name" name="your_name" required>
                                    </div>
                                    <!-- 件名 -->
                                    <div class ="form-group">
                                        <label for="title">件名</label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                    <!-- メールアドレス -->
                                    <div class ="form-group">
                                        <label for="email">メールアドレス</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <!-- ホームページ -->
                                    <div class ="form-group">
                                        <label for="url">ホームページ</label>
                                        <input type="url" class="form-control" id="url" name="url" >
                                    </div>
                                    <!-- 性別 -->
                                    <div class="from-check form-check-inline" >
                                        性格
                                        <!-- 男性 -->
                                        <input type="radio" class="form-check-input" name="gender" value="0" id="gender0">
                                        <label class="form-check-label" for="gender0">男性</label>
                                        <!-- 女性 -->
                                        <input type="radio" class="form-check-input"　name="gender" value="1" id="gender1">
                                        <label class="form-check-label" for="gender1">女性</label>
                                    </div>

                                    <!-- 年齢 -->
                                    <div class="form-group">
                                        <label for="age">年齢</label>
                                            <select class="form-control" id="age" name="age">

                                                <option value="">選択してください</option>
                                                <option value="1">~19歳</option>
                                                <option value="2">20歳~29歳</option>
                                                <option value="3">30歳~39歳</option>
                                                <option value="4">40歳~49歳</option>
                                                <option value="5">50歳~59歳</option>
                                                <option value="6">60歳~</option>

                                            </select>
                                    </div>
                                    <!-- お問合せ内容 -->
                                    <div class="form-group">
                                        <label for="contact">お問合せ内容</label>
                                        <textarea class="form-control" id="contact" rows="3" name="contact"></textarea>
                                    </div>
                                    <!-- 注意事項 -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="caution" name="caution" value="1">
                                        <label class="form-check-label" for="caution">注意事項にチェック</label>
                                    </div>
                                    <!-- 登録ボタン -->
                                    <input class="btn btn-info" type="submit" value="登録する">
                                </form>

                                <form method= "GET" action="{{route('contact.index')}}">
                                    <!-- 戻るボタン -->
                                    <input class="btn btn-primary" type="submit" value="戻る">
                                </form>
                            </div> {{-- col-md-6 --}}
                        </div> {{-- row --}}
                    </div> {{-- container --}}
                </div> {{-- card-body --}}
                {{-- フォーム画面部分（終了） --}}

            </div>
        </div>
    </div>
</div>
@endsection
