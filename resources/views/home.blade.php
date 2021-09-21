@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col"> <h3> Purchase Form </h3> </div>
    </div>

    <div class="row">
        <form action="{{route('submit_purchase')}}" method="POST" class="row g-3">
            
            @csrf

            <div class="col-md-12">
                <label for="product" class="form-label">Your name</label>
                <input type="text" name="customer" class="form-control" id="customer" minlength="1" value="{{old('customer')}}" required>
            </div>

            <div class="col-md-6">
                <label for="product" class="form-label">Select Product</label>
                <select id="product" name="product_id" class="form-select" required>
                    <option value=""> Please select </option>
                    @foreach ($products as $product)
                        <option value="{{$product->id}}"> {{$product->name}} @ Php {{$product->price}} each </option> 
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="quantity" class="form-label"> Quantity </label>
                <input type="number" name="quantity" class="form-control" id="quantity" min="1" value="{{old('quantity')}}" required>
            </div>

            <div class="col-md-6">
                <button class="btn btn-primary" type="submit"> Buy </button>
            </div>

        </form>
    </div>
@endsection