@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Товар: {{ $product->name }}</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{asset('product__'.$product->id.'.jpg')}}" width="100%" alt="" class="img-fluid">
                            {{--                            <img src="{{asset('product_'.$product->id.'.jpg')}}" width="100%" alt="" class="img-fluid">--}}
                        </div>
                        <div class="col-md-6">
                            <p>Цена: {{ number_format($product->price, 2, '.', '') }}</p>
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

                                    {{--                            {{$_COOKIE['favorite_id']}}--}}
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
                    <div class="row">
                        <div class="col-12">
                            <h2>Описание товара</h2>
                            <p class="mt-4 mb-20">{{ $product->content }}</p>
                        </div>
                    </div>
                    <h2> Отзывы</h2>

                    <form class="mb-3" action="{{route('review.add',['id'=>$product->id])}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Оставьте ваш отзыв о
                                товаре</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="content"
                                      rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить отзыв</button>
                    </form>


                    @if ($product->reviews->count())
                        @foreach ($product->reviews as $review)
                            <div class="card mb-3">
                                <div class="card-body p-2">
                                    {{ $review->content }}
                                </div>
                                <div class="card-footer p-2 d-flex justify-content-between">
                                    <span>{{ $review->created_at }}</span>

                                </div>
                            </div>
                        @endforeach

                    @else
                        <p>К этому товару еще нет отзывов</p>
                    @endif
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            Категория:
                            <a href="{{ route('catalog.category', ['slug' => $product->category->slug]) }}">
                                {{ $product->category->name }}
                            </a>
                        </div>
                        <div class="col-md-6">

                            <p class="float-end">
                                Дата добавления:
                                {{ $product->created_at }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
