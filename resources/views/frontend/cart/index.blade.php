@extends('layouts.frontend')

@section('content')

<section class="breadcrumb-section set-bg" data-setbg="frontend/img/bare1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Panier d'achats</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('home') }}">Accueil</a>
                        <span>Panier d'achats</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Produits</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td class="shoping__cart__item">
                                        <img src="{{ $product->gallery->first()->getUrl() }}" width="100" height="100" alt="Product Image">
                                        <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                    </td>
                                <td class="shoping__cart__price">
                                    <a href="{{ route('product.show', $product->slug) }}">${{ $product->price }}</a>
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="number" value="1" min="1" onchange="updateTotal(this)">
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total" id="totalPrice">
                                    ${{ $product->price }}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <span class="icon_close"></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{ route('home') }}" class="primary-btn cart-btn">CONTINUER MES ACHATS</a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Total du panier</h5>
                    <ul>
                        <li>Sous-total <span id="subtotal">${{ $product->price }}</span></li>
                        <li>Total <span id="cartTotal">${{ $product->price }}</span></li>
                    </ul>
                    <a href="{{ route('checkout.process') }}" class="primary-btn">PASSER À LA CAISSE</a>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    function updateTotal(input) {
        const price = {{ $product->price }};
        const quantity = parseInt(input.value);
        const subtotal = price * quantity;

        document.getElementById('subtotal').innerText = `$${subtotal.toFixed(2)}`;
        document.getElementById('cartTotal').innerText = `$${subtotal.toFixed(2)}`;
        document.getElementById('totalPrice').innerText = `$${subtotal.toFixed(2)}`;
    }
</script>
@endsection
