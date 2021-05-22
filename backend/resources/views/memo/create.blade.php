@extends('layouts.app')

@section('content')

<h3>開発用メモ新規作成ページ</h3>

<form method="POST" action="{{route('memo.store')}}">
@csrf
    <div class="row">
        <div class="form-group col-md-4">
            <input class="form-control" type="text" name="title" required placeholder="一言">
        </div>

        <div class="form-group col-md-6">
            <!-- <input class="form-control" type="text" name="description" required placeholder="詳細"> -->
            <textarea class="form-control" type="text" name="description" required placeholder="詳細">
            </textarea>
        </div>

    <input class="btn btn-primary form-group col-md-1" type="submit" value="登録">
    </div>



</form>


@endsection
