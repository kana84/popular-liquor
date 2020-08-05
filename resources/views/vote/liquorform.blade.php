<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scal=1.0">
    <title>人気お酒投票</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <header>
        <nav class="my-navbar">
            <a class="my-navbar-brand" href="/code">好きなお酒アンケート</a>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col col-md-offset-3 col-md-6">
                    <nav class="panel panel-info">
                        <div class="panel-heading">好きなお酒を1つ選んでください</div>
                        <div class="panel-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $message)
                                        <li>{{$message}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('vote.liquor',['id' => $available_code_id])}}" method="post">
                             @csrf
                             <div class="form-group">
                                 @foreach($liquors as $liquor)
                                 <label class="radio-control">
                                 <input type="radio" name="liquor" value="{{$liquor->id}}">
                                 {{ $liquor->liquor_name }}
                                 @endforeach
                             </div>
                             <div class="text-right">
                                 <button href="{{ route('vote.liquor',['id' => $available_code_id])}}" class="btn btn-primary active">投票！</button>
                             </div>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </main>
</body>
</html>