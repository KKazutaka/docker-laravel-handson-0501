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

    @foreach($contacts as $contact)
    <tr>
        <th>{{ $contact->id }}</th>
        <td>{{ $contact->your_name }}</td>
        <td>{{ $contact->title }}</td>
        <td>{{ $contact->created_at }}</td>
        <td><a href="{{route('contact.show',['id'=>$contact->id] )}}">詳細をみる</a></td>
    </tr>
    @endforeach

    <form action="{{route('contact.create')}}" method="GET">
        <button type="submit" class="btn btn-primary">
        <a href="{{route('contact.create')}}">新規登録</a>
        </button>
    </form>

    </div>
</body>
</html>
