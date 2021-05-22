@extends('layouts.app')

@section('content')

<h3>開発用メモ。実現したいこと・マイルストーン的なの書く</h3>
<p>編集したい時には、Titleを選択してください。</p>



<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>desc</th>
            <th>created_at</th>
            <th>update_at</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($memos as $memo)
        <tr>
            <th class="col-3">
                <a href="{{route('memo.edit',['id'=>$memo->id])}}">
                    {{$memo->title}}
                </a>
            </th>
            <td class="col-3">{{$memo->description}}</td>
            <td class="col-2">{{$memo->created_at}}</td>
            <td class="col-2" >{{$memo->updated_at}}</td>
        </tr>
        @endforeach
    </tbody>

</table>

<input type="button" class="btn btn-info float-right" onclick='location.href="{{route('memo.create')}}"' value="新規作成">



@endsection
