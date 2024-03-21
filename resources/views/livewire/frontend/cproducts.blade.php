<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4" style="color:royalblue">Our Products</h2>
            </div>
             <div class="row">
               {{-- <div class="col-2">
                    <div class="card">
                        {{-- <div class="card-header">Filter using Price</div>
                        <div class="card-body">
                            <div class="form-check">
                                <input type="radio"  class="form-check-input" value="above1000" wire:model="priceInput">
                                <label class="form-check-label"> >= 1000 and <=2000 </label>
                            </div>
                            <div class="form-check">
                                <input type="radio"  class="form-check-input" value="above2000" wire:model="priceInput">
                                <label class="form-check-label"> > 2000 and <=5000</label>
                            </div>
                        </div>
                    </div>--}}
                </div>
                <div class="col-10">
                    <div class="row">
                        @forelse ($products as $pro)
                        <div class="col-3">
                            <div class="product-card">
                                <div class="product-card-img">
                                    @if ($pro->qty > 0)
                                    <label class="stock bg-success">In Stock</label>
                                    @else
                                    <label class="stock bg-danger">Out of Stock</label>
                                    @endif

                                    @if ($pro->productImages()->count()>0)
                                        <a href="{{url('collections/'.$category->name.'/'.$pro->name)}}">
                                            <img src="{{asset($pro->productImages[0]->image)}}"
                                            alt="{{$pro->name}}" height='180px'>
                                        </a>
                                    @endif

                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">{{$pro->brand}}</p>
                                    <h5 class="product-name">
                                       <a href="">
                                            {{$pro->name}}
                                       </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">${{$pro->selling_price}}</span>
                                        <span class="original-price">${{$pro->original_price}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            <h1>No product Found for {{$category->name}}</h1>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
