<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="card-body">
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    createです
<form method="POST" action="{{route('contact.store')}}">
@csrf

氏名
<input type="text" name="your_name">
<br>
件名
<input type="text" name="title">
<br>
メールアドレス
<input type="email" name="email">
<br>
ホームページ
<input type="url" name="url">
<br>
性別
<input type="radio" name="gender" value="0">男性</input>
<input type="radio" name="gender" value="1">女性</input>
<br>
年齢
<select name="age" id="">
<option value="">選択してください</option>
<option value="1">-19</option>
<option value="2">20-29</option>
<option value="3">30-39</option>
<option value="4">40-49</option>
<option value="5">50-59</option>
<option value="6">60-</option>
</select>
<br>
お問い合わせ内容
<textarea name="contact" id="" cols="30" rows="10"></textarea>
<br>

<input type="checkbox" name="caution" value="1">注意事項
<br>

<input class="btn btn-info" type="submit" value="登録する">
</form>

    </div>
</body>
</html>
