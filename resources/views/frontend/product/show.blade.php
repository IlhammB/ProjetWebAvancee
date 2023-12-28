@extends('layouts.frontend')
@section('content')

    <section class="product-details spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="product__details__pic">
              <div class="product__details__pic__item">
                <img
                  class="product__details__pic__item--large"
                  src="{{ optional($product->gallery->first())->geturl() }}"
                  alt=""
                />
              </div>
              <div class="product__details__pic__slider owl-carousel">
              @foreach($product -> getMedia('gallery') as $gallery)
                <img
                  data-imgbigurl="{{ $gallery->getUrl() }}"
                  src="{{ $gallery->getUrl() }}"
                  alt=""
                />
              @endforeach
             </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="product__details__text">
              <h3>{{ $product->name }}</h3>
              <div class="product__details__rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                
              </div>
              <div class="product__details__price">${{ $product->price }}</div>
              <p>
                {{$product->description}}
              </p>
              <div class="product__details__quantity">
                <div class="primary-btn cart-btn">
                  
                  <a href="{{ route('cart', ['product_id' => $product->id]) }}">ADD TO CART</a>
                  
                </div>
              </div>
              
              
              <ul>
                <li><b>Weight</b> <span>{{$product->weight}} gram</span></li>
                
              </ul>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="product__details__tab">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    data-toggle="tab"
                    href="#tabs-1"
                    role="tab"
                    aria-selected="true"
                    >Description</a
                  >
                </li>
               
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                  <div class="product__details__tab__desc">
                    <h6>Products Infomation</h6>
                    {{$product->details}}
                   
                  </div>
                </div>
                <div class="tab-pane" id="tabs-3" role="tabpanel">
                  <div class="product__details__tab__desc">
                    <h6>Products Infomation</h6>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    
@endsection