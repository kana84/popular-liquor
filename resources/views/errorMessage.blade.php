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
                    <nav class="panel panel-danger">
                        <div class="panel-heading">{{$error_message}}</div>
                        <div class="panel-body">
                             <div class="text-right">
                                 <button type="button" onclick="history.back()" class="btn btn-primary active">戻る</button>
                             </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </main>
</body>
</html>