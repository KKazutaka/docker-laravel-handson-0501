@extends('layouts.app')


@section('content')


<h3 class="headline">
新規作成
</h3>
<form method="POST" action="{{route('habit.store')}}">
@csrf


<div class="input-group align-items-center row">
        行動
    <div class="col-4">
        <input type="text" class="form-control" name="habits_name" placeholder="行動">
    </div>

        目標
    <div class="col-5">
        <input type="text" class="form-control " name="description" placeholder="具体的目標を書きましょう">
    </div>
<input class="btn btn-info col-1" type="submit" value="登録する">
</div>

</form>


    <table class="table">
        <tbody>
        <thead>
        <tr>

        <th>登録一覧</th>
        <th>目標</th>
        <th></th>
        <th></th>
        </tr>
        </thead>
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
                <a href="{{route('habit.edit',['id'=>$habit->id])}}" class="btn btn-primary" >
                    編集
                </a>
            </td>
            <td>
            <form method="POST" action="{{route('habit.destroy',['id'=>$habit->id])}}" id="delete_{{$habit->id}}">
            @csrf
            <!-- <input type="submit" value="削除"> -->
            <a href="#" class="btn btn-danger" onclick="deletePost({{$habit->id}});">
            <!-- udemy では、date-id=$habit->id を書いてたけど不要？ -->
                削除
            </a>
            </form>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>



    <!-- 削除時の確認画面 -->
    <script>
        function deletePost(id){
            'use strict';
            if(window.confirm('本当に削除していいですか？')){
                document.getElementById('delete_'+id).submit();
                console.log(e.dataset.id);
            }
        }
    </script>


@endsection
