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
                    <nav class="panel panel-success">
                        <div class="panel-heading">投票ありがとうございます！</div>
                        <div class="panel-body text-center">現在の総投票数は{{$total}}票です
                             <div>
                             <table class="table table-striped table-responsive">
                                <tbody class="col col-md-offset-4 col-md-7">
                                    @foreach($liquor_votes as $liquor_vote)
                                    <tr>
                                        <td>{{$liquor_vote->name}}</td>
                                        <td>{{$liquor_vote->liquor_subtotal}}票</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>
                             </div>
                             <div class="text-right">
                                 <button onclick="location.href='/code'" class="btn btn-primary active">TOPに戻る</button>
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