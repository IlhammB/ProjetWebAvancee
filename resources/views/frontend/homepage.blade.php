@extends('layouts.frontend')
@section('content')


        
        <section class="categories mt-5">
            <div class="container">
                <div class="row">
                    <div class="categories__slider owl-carousel">
                        
                        @foreach($menu_categories as $menu_category)
                        <div class="col-lg-3">
                            <div
                                class="categories__item set-bg"
                                data-setbg="{{ $menu_category->photo ? $menu_category->photo->getUrl() : '' }}"
                            >
                                <h5><a href="{{ route('shop.index',$menu_category->slug) }}">{{ $menu_category ->name}}</a></h5>
                                
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        
        <section class="featured spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Featured Product</h2>
                        </div>
                    </div>
                </div>
                <div class="row featured__filter">
                    
                @foreach($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
       
                            <div 
                                class="featured__item__pic set-bg"
                                data-setbg="{{ asset($product->getFirstMediaUrl('gallery')) }}" >
                                <ul class="featured__item__pic__hover">
                                    
                                    <li><a href="{{ route('cart', ['product_id' => $product->id]) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                                <div class="featured__item__text">
                                        <h6><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h6>
                                        <h5>${{ $product->price }}</h5>
                                </div>
                        </div>
                    </div>
                @endforeach

                           
                        
                </div>
            </div>
        </section>
       
@endsection