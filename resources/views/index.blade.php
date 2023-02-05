@extends('layout.app')

@section('content')
    <h1>Интернет-магазин</h1>
    <div class="col-md-12">
        <h4>Избранные товары</h4>
        @if(isset($_COOKIE['favorite_id']))
            <div class="row">
                @foreach($data as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $product->name }}</h4>
                            </div>
                            <div class="card-body p-0">
                                <img src="{{asset('product__'.$product->id.'.jpg')}}" width="100%" alt=""
                                     class="img-fluid">
                                {{--                                <img src="{{asset('product_'.$product->id.'.jpg')}}" width="100%" alt="" class="img-fluid">--}}
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('catalog.product', ['slug' => $product->slug]) }}"
                                   class="btn btn-dark">Перейти к товару</a>


                                <form action='{{route('favorite.delete',['id' => $product->id])}}'
                                      method="post" class="d-flex">
                                    @csrf

                                    <button type="submit" class="btn btn-success">
                                        Удалить из избранного
                                    </button>
                                </form>


                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Избранных товаров пока нет</p>
        @endif
        <h4>Популярные категории</h4>
        <div class="row">
            @foreach($cat as $key=>$count)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $key }}</h4>
                        </div>
                        <div class="card-body p-0">
                            <img src="{{asset('category__'.$count['id'].'.jpg')}}" width="100%" alt=""
                                 class="img-fluid">
                            {{--                            <img src="{{asset('category_'.$count['id'].'.jpg')}}" width="100%" alt="" class="img-fluid">--}}
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('catalog.category', ['slug' => $count['slug']]) }}"
                               class="btn btn-dark">Перейти в категорию</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection
