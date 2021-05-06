<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

新規作成
<form method="POST" action="{{route('habit.store')}}">
@csrf
行動
<input type="text" name="habits_name" placeholder="行動">
目標
<input type="text" name="description" placeholder="具体的目標を書きましょう">
<input class="btn btn-info" type="submit" value="登録する">
</form>

<br>
<br>
登録一覧
    <table border=1>
        @foreach($habits as $habit)
        <tr>
            <th style="min-width:150px;">
                {{ $habit->habits_name}}
            </th>
            <br>
            <td style="min-width:350px;">
                {{$habit->description}}
            </td>
            <td>
                <!-- TODO:ページ遷移せずに、ポップアップを表示したい -->
                <a href="{{route('habit.edit',['id'=>$habit->id])}}">
                    編集
                </a>
            </td>
            <td>
            <form method="POST" action="{{route('habit.destroy',['id'=>$habit->id])}}">
            @csrf
            <input type="submit" value="削除">
            <!-- TODO：ダサいし、確認画面ほしい -->
            <!-- <a href="#" date-id="{{$habit->id}}" onclick="deletePost(this);"> -->
                <!-- 削除 -->
            </a>
            </form>
            </td>
            @endforeach
        </tr>
    </table>

    <!-- 削除時の確認画面 -->
    <script>
        function deletePost(e){
            'use strict';
            if(confirm('本当に削除していいですか？')){
                document.getElementById('delete_'+e.dataset.id).submit();
            }
        }
    </script>
</body>
</html>
