<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7ba3ca73a9.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: #e7e0cf">
    @if (session('flash_message'))
        <div class="alert alert-primary text-center">
            {{ session('flash_message') }}
        </div>
    @endif
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top" style="margin-bottom: 10%">
        <a class="navbar-brand" href="#">miyacleApp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4"
            aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav4">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">トップ</a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            マイページ
                        </a>
                        <div class="dropdown-menu bg-dark border-0 text-light" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item text-light"
                                href="{{ route('user.show', ['id' => auth()->id()]) }}">マイページ編集</a>
                            <a class="dropdown-item text-light" href="#">パスワード変更</a>
                            <a class="dropdown-item text-light" href="#">過去投稿</a>
                            <a class="dropdown-item text-light" href="#">過去返答</a>
                            <a class="dropdown-item text-light" href="{{ route('user.delete_confirm') }}">退会</a>
                        </div>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('guest.login') }}">簡単ログイン</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
                    </li>
                @endguest
                @auth
                    <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                        @csrf
                    </form>
                    <li class="nav-item">
                        <a class="nav-link" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create') }}">投稿する</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>


    <!-- メインコンテンツ -->
    <div class="container">
        @yield('content')
    </div>
    <!-- フッター -->
    <div id="footer" class="w-100">
        <footer class="bg-dark d-flex justify-content-center py-3" style="height: 70px;">
            <div class="d-flex">
                <p class="align-self-center text-light">2022</p>
            </div>
        </footer>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="{{ asset('/js/footer.js') }}"></script>
    <script src="{{ asset('/js/showPass.js') }}"></script>
    <script src="{{ asset('/js/tableLink.js') }}"></script>
</body>

</html>
