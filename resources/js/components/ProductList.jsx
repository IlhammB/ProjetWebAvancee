import React from "react";
import ReactDOM from "react-dom";
import axios from "axios";
import swal from "sweetalert";

const ProductList = () => {
   return (
      <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
         <div class="featured__item">
            <div class="featured_item_pic set-bg" data-setbg="">
               <ul class="featured_itempic_hover">
                  <li><a href="#"><i class="fa fa-heart"></i></a></li>
                  <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i></a></li>
               </ul>
            </div>
            <div class="featured_item_text">
               <h6><a href="">$product name </a></h6>
               <h5>$ product price </h5>
            </div>
         </div>
      </div>
   );
};

export default ProductList;

if (document.getElementById('product-list')) {
    ReactDOM.render(<ProductList />, document.getElementById('product-list'));
}
