@extends('layouts.app')

@section('content')

<h3>
editページです
</h3>

<form action="{{route('memo.update',['id'=>$memo->id])}}" method="POST">
@csrf

    <div class="input-group">
        <input type="text" class="form-control" name="title" value="{{$memo->title}}">
        <input type="text" class="form-control" name="description" value="{{$memo->description}}">
    </div>
    <input type="submit" value="更新する">
</form>

<form action="{{route('memo.destroy',['id'=>$memo->id]) }}" method="POST" id="delete_{{$memo->id}}">
@csrf
    <a href="#" class="btn btn-danger" onclick="deletePost({{$memo->id}});">
    削除
    </a>
</form>

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
