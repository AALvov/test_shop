@extends('layout.app')

@section('content')
    <h1>Результаты поиска по запросу: "{{$search}}"</h1>
    <div class="col-md-12">
        <h4>Найденные категории</h4>
        <div class="row">
            @forelse($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $category->name }}</h4>
                        </div>
                        <div class="card-body p-0">
                            <img src="{{asset('category__'.$category->id.'.jpg')}}" width="100%" alt=""
                                 class="img-fluid">
                            {{--                            <img src="{{asset('category_'.$category->id.'.jpg')}}" width="100%" alt="" class="img-fluid">--}}
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('catalog.category', ['slug' => $category->slug]) }}"
                               class="btn btn-dark">Перейти к категории</a>
                        </div>
                    </div>
                </div>
            @empty
                <h5>По данному запросу категорий не найдено</h5>
            @endforelse
        </div>
        <h4>Найденные товары</h4>
        <div class="row">
            @forelse($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $product->name }}</h4>
                        </div>
                        <div class="card-body p-0">
                            <img src="{{asset('product__'.$product->id.'.jpg')}}" width="100%" alt="" class="img-fluid">
                            {{--                            <img src="{{asset('product_'.$product->id.'.jpg')}}" width="100%" alt="" class="img-fluid">--}}
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
            @empty
                <h5>По данному запросу товаров не найдено</h5>
            @endforelse
        </div>
    </div>
@endsection
