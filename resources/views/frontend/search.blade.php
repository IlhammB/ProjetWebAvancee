@extends('layouts.frontend')

@section('content')
 
    @if($products->count() > 0)
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-3">
                    <div class="product__item">
                        <div class="product__item__pic set-bg"
                             data-setbg="{{ asset($product->getFirstMediaUrl('gallery')) }}">
                            <!-- Image du produit -->
                        </div>
                        <div class="product__item__text">
                            <h5><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h5>
                            <h5>${{ $product->price}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No results found.</p>
    @endif
@endsection

