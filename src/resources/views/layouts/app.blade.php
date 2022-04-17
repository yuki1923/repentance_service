<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    {{-- Bootstrapの導入は以下でもOK --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> --}}
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    {{-- googleフォント用 --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <title>
        @yield('title')
    </title>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand navbar-dark bg-success text-white mb-5">
            <a class="navbar-brand site-logo">Yanbaru Qiita</a>

            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item">
                    <a class="nav-link">ログイン</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">ユーザー登録</a>
                </li>
            </ul>

        </nav>

        @yield('content')

    </div>
</body>
</html>