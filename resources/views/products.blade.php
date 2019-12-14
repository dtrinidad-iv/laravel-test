@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Products</div>

                    <div class="card-body">
                      <div class="pull-right">

                          <a href="{{ route('checkout') }}">
                              <button type="button" class="btn btn-secondary">
                                  View Cart
                              </button>
                          </a>
                      </div>
                      <br>
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if ($products->count() === 0)
                            <h1>Congrats, you made it to the Products page</h1>
                            <p>There are no products to look at currently but we can fix that :-)</p>
                        @else
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-4"> Name</div>
                                <div class="col-4"> Desc.</div>
                                <div class="col-2"> Price</div>
                            </div>
                            @foreach ($products as $product)
                              <hr>
                              <add-to-cart :product="{{$product}}"></add-to-cart>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
