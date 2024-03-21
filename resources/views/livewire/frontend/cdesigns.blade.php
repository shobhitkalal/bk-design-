<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Designs</h4>
            </div>
            {{-- <div class="row">
                <div class="col-2">
                    <div class="card">
                        <div class="card-header">Filter using Price</div>
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
                    </div>
                </div> --}}
                <div class="col-10">
                    <div class="row">
                        @forelse ($designs as $desi)
                                    @if ($desi->designImages()->count()>0)
                                        <a href="{{url('designcollections/'.$designcategory->name.'/'.$desi->name)}}">
                                            <img src="{{asset($desi->designImages[0]->image)}}"
                                            alt="{{$desi->name}}" height='180px'>
                                        </a>
                                    @endif
                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">{{$desi->designcategory}}</p>
                                    <h5 class="product-name">
                                       <a href="">
                                            {{$desi->name}}
                                       </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        @empty
                            <h1>No Designs Found for {{$designcategory->name}}</h1>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
