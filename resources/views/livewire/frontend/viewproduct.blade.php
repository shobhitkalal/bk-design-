<div class="container mt-5">
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border"wire:ignore>
                        @if ($product->productImages()->count()>0)

                        <div class="exzoom" id="exzoom">
                            <!-- Images -->
                            <div class="exzoom_img_box">
                              <ul class='exzoom_img_ul'>
                                @foreach ($product->productImages as $imageFile)
                               <li> <img src="{{asset($imageFile->image)}}"
                                alt="{{$product->name}}"></li>
                            @endforeach
                              </ul>
                            </div>
                            <div class="exzoom_nav"></div>
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                            </p>
                          </div>

                        @endif




                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                           {{$product->name}}
                           @if ($product->qty > 0)
                           <span class="badge bg-success float-end">In Stock</span>
                           @else
                           <span class="badge bg-danger float-end">Out of Stock</span>
                           @endif
                           </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{$category->name}} / Product / {{$product->name}}
                        </p>
                        <div>
                            <span class="selling-price">${{$product->selling_price}}</span>
                            <span class="original-price">${{$product->original_price}}</span>
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQty">-</span>
                                <input type="text"  wire:model="qtyCount" value="{{$this->qtyCount}}" readonly class="input-quantity" style="width: 40px" />
                                <span class="btn btn1" wire:click="incrementQty">+</span>
                                 </div>

                        </div>
                        <div class="mt-2">
                            <button class="btn btn1" wire:click="addToCart({{$product->id}})"> <i class="bi bi-cart-fill"></i> Add To Cart</button>
                      </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Description</h5>
                            <p>{{$product->description}}
                              </p>
                        </div>
                    </div>
                </div>
            </div>
</div>

@push('scripts')
    <script>
        $(function(){

$("#exzoom").exzoom({

  // thumbnail nav options
  "navWidth": 60,
  "navHeight": 60,
  "navItemNum": 5,
  "navItemMargin": 7,
  "navBorder": 1,

  // autoplay
  "autoPlay": false,

  // autoplay interval in milliseconds
//   "autoPlayTimeout": 2000

});

});
    </script>
@endpush
