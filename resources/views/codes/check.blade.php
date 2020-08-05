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
                        <div class="panel-heading">投票コードを入力してください</div>
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
                            <form action="{{ route('code.input')}}" method="post">
                             @csrf
                             <div class="form-group">
                                 <label for="title">投票コード（5桁）</label>
                                 <input type="text" class="form-control" name="code">
                             </div>
                             <div class="text-right">
                                 <button href="{{ route('code.input')}}" class="btn btn-primary active">送信</button>
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