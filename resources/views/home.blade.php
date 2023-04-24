@extends('welcome')

@section('content')

<div class="container">
    <div class="row">
        <div class="single-item">
            @foreach($productHome as $item)
            <div class="form-control">
                <div>
                    <h5 class="card-title class-name" data-id="{{$item->id}}">{{$item->name}}</h5>
                    <h6 class="card-text class-valor" data-id="{{$item->id}}" data-valor="{{$item->price}}"> $ {{number_format($item->price,0, '', '.')}}</h6>
                    <img class="img-fluid" src="{{$item->url}}" alt="">
                    <div class="form-control mt-3">
                        <div class="row">
                           
                            <div class="col-3">
                                <input class="form-control input-number" data-id="{{$item->id}}" type="number" name="" id="">
                            </div>
                            <div class="col-3">
                                <button class="btn btn-success" onclick="addToCar(this)" data-id="{{$item->id}}">ADD
                                    <i class="fa-solid fa-cart-arrow-down"></i>
                                </button>
                            </div>
                        </div>
                        
                        <p class="card-text">{{$item->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="multiple-motos">
            @foreach($productVentas as $item)
                <div class="form-control">
                    <div>                
                        <h5 class="card-title class-name" data-id="{{$item->id}}">{{$item->name}}</h5> 
                        <div class="row">
                            <div class="col-3">
                                <input class="form-control input-number"  data-id="{{$item->id}}" type="number" name="" id="">
                            </div>
                            <div class="col-3">
                                <button class="btn btn-success" onclick="addToCar(this)" data-id="{{$item->id}}">
                                    <i class="fa-solid fa-cart-arrow-down"></i>
                                </button>
                            </div>
                        </div>
                        <h6 class="card-text class-valor" data-id="{{$item->id}}" data-valor="{{$item->price}}"> $ {{number_format($item->price,0, '', '.')}}</h6>
                        <img class="img-fluid" src="{{$item->url}}" alt="">
                        <p class="card-text">{{$item->description}}</p>
                
                    </div>
                </div>
            @endforeach
        </div>

    </div>
   
</div>

@endsection