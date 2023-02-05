<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Магазин</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<div class="container">
    <nav style="margin-bottom: 20px" class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="/">Интернет-Магазин</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="/">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('catalog')}}">Каталог</a>
                    </li>

                </ul>
                <form class="d-flex" action="{{route('catalog.search')}}" method="GET">
                    <input class="form-control me-2" type="search" name="search" placeholder="Поиск..."
                           aria-label="Поиск">
                    <button class="btn btn-light btn-outline-success" type="submit">Поиск</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>

</div>
</body>
</html>
