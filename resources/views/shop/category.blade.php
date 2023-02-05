@extends('layout.app')

@section('content')
    <h1>Категория: {{ $category->name }}</h1>
    <p>{{ $category->content }}</p>

    <div class="bg-primary p-2 mb-4">

        <form method="get"
              action="{{ route('catalog.category', ['slug' => $category->slug]) }}">
            <label>Сортировка товара: </label>
            <select name="sort" class="form-control d-inline w-25 mr-4" title="Сортировка">
                <option value="0">Сортировать по....</option>
                <option value="popularity" @if(request()->sort == 'popularity') selected @endif>По популярности</option>
                <option value="date_new" @if(request()->sort == 'date_new') selected @endif>По дате добавления (сначала
                    новые)
                </option>
                <option value="date_old" @if(request()->sort == 'date_old') selected @endif>По дате добавления (сначала
                    старые)
                </option>

            </select>
            <button type="submit" class="btn btn-light">Фильтровать</button>
            <a href="{{ route('catalog.category', ['slug' => $category->slug]) }}"
               class="btn btn-light">Сбросить</a>
        </form>
    </div>
    <div class="row">

        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $product->name }}</h4>
                    </div>
                    <div class="card-body p-0">
                        <img src="{{asset('product__'.$product->id.'.jpg')}}" width="100%" alt="" class="img-fluid">
                        {{--                        <img src="{{asset('product_'.$product->id.'.jpg')}}" alt="" width="100%" class="img-fluid">--}}
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('catalog.product', ['slug' => $product->slug]) }}"
                           class="btn btn-dark">Перейти к товару</a>
                        @if(isset($_COOKIE['favorite_id']))
                            @if(in_array($product->id,explode(',',$_COOKIE['favorite_id'])))
                                <form action='{{route('favorite.delete',['id' => $product->id])}}'
                                      method="post" class="d-flex">
                                    @csrf

                                    <button type="submit" class="btn btn-success">
                                        Удалить из избранного
                                    </button>
                                </form>

                            @else

                                <form action='{{route('favorite.add',['id' => $product->id])}}'
                                      method="post" class="d-flex">
                                    @csrf

                                    <button type="submit" class="btn btn-success">
                                        Добавить в избранное
                                    </button>
                                </form>
                            @endif
                        @else
                            <form action='{{route('favorite.add',['id' => $product->id])}}'
                                  method="post" class="d-flex">
                                @csrf

                                <button type="submit" class="btn btn-success">
                                    Добавить в избранное
                                </button>
                            </form>

                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
