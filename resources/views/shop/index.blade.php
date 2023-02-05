@extends('layout.app')

@section('content')
    <h1>Каталог товаров</h1>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ducimus, eligendi
        exercitationem expedita, iure iusto laborum magnam qui quidem repellat similique
        tempora tempore ullam! Deserunt doloremque impedit quis repudiandae voluptas?
    </p>

    <h2>Категории товаров</h2>
    <div class="row">
        @foreach ($data as $root)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $root->name }}</h4>
                    </div>
                    <div class="card-body p-0">
                        <img src="{{asset('category__'.$root->id.'.jpg')}}" width="100%" alt="" class="img-fluid">
                        {{--                        <img src="{{asset('category_'.$root->id.'.jpg')}}" width="100%" alt="" class="img-fluid">--}}
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('catalog.category', ['slug' => $root->slug]) }}"
                           class="btn btn-success">Перейти в категорию</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
