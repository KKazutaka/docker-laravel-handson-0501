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

    showです
    {{$contact->your_name}}
    {{$contact->title}}
    {{$contact->email}}
    {{$contact->url}}
    {{$contact->gender}}
    {{$contact->age}}
    {{$contact->contact}}
<form method="GET" action="{{route('contact.edit',['id'=>$contact->id])}}">
@csrf
<input class="btn btn-info" type="submit" value="変更する">
</form>

<form method="POST" action="{{route('contact.destroy',['id'=>$contact->id])}}" id="delete_{{$contact->id}}">
@csrf
<a href="#" class="btn btn-dander" data-id="{{$contact->id}}" onclick="deletePost(this);">削除する</a>
</form>

<script>
    function deletePost(e){
        'use strict';
        if(confirm('本当に削除していいですか？')){
            document.getElementById('delete_'+e.dataset.id).submit();
        }
    }
</script>


    </div>
</body>
</html>
