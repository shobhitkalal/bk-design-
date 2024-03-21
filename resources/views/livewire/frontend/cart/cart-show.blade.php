<div class="py-3 py-md-5 bg-light">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="shopping-cart">

                    <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                        <div class="row">
                            <div class="col-md-4">
                                <h4>Products</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Price</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Quantity</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Total Price</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Remove</h4>
                            </div>
                        </div>
                    </div>
                    @forelse ($cart as $c)
                    <div class="cart-item p-2 bg-white">
                        <div class="row">
                            <div class="col-md-4 my-auto">
                                <a href="">
                                    <label class="product-name">
                                        @if ($c->product->productImages->count()>0)
                                        <img src="{{$c->product->productImages[0]->image}}" style="width: 50px; height: 50px" alt="{{$c->product->name}}">
                                        @endif

                                        {{$c->product->name}}
                                    </label>
                                </a>
                            </div>
                            <div class="col-md-2 my-auto">
                                <label class="price">${{$c->product->selling_price}} </label>
                            </div>
                            <div class="col-md-2 col-7 my-auto">
                                <div class="quantity">
                                    <div class="input-group">
                                        <button type="button" wire:click="decreaseQty({{$c->id}})" wire:loading:attr="disabled">-</button>
                                        <input type="text"  value="{{$c->quantity}}"  readonly class="input-quantity" style="width: 40px;text-align:center" />
                                        <button type="button" wire:click="increaseQty({{$c->id}})" wire:loading:attr="disabled">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 my-auto">
                                <label class="price">${{$c->product->selling_price *  $c->quantity}} </label>
                                @php
                                    $totalPrice += $c->product->selling_price *  $c->quantity
                                @endphp

                            </div>
                            <div class="col-md-2 col-5 my-auto">
                                <div class="remove">
                                    <button class="btn btn-danger btn-sm" wire:click="removeCartItem({{$c->id}})" wire:loading:attr="disabled">
                                        <i class="bi bi-trash"></i> Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <h1>No Cart Item Found</h1>
                    @endforelse


                </div>
            </div>

            <div class="row mt-3">
                <div class="col-8">
                    Get the best deals and offers
                </div>
                <div class="col-4">
                    <h4>Total: <span class="float-end">${{$totalPrice}}</span></h4>
                    <hr/>
                    <div class="d-grid gap-2">
                        <a type="button" class="btn btn-warning"
                        href="{{url('/checkout-show')}}">
                            Checkout
                        </a>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
