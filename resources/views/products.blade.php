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

                        @if ($products->count() === 0)
                            <h1>Congrats, you made it to the Products page</h1>
                            <p>There are no products to look at currently but we can fix that :-)</p>
                        @else
                              <add-to-cart :products="{{$products}}"></add-to-cart>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
