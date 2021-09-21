@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-2">
            <h2>Hi, Admin!</h2>
        </div>
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Admin Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="card">
            <div class="card-header">
              Edit {{$product->name}}
            </div>
            <div class="card-body">
                @if($errors->any())
                    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                @endif

                <div class="row">
          
                        <form action="{{route('update_product',['id' => $product->id])}}" method="POST" class="row g-3">
                            @csrf
                          
                                  <div class="col-md-12">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                                  </div>

                                  <div class="col-md-6">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}" min=1 >
                                  </div>

                                  <div class="col-md-6">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" class="form-control" id="stock" name="stock" value="{{$product->stock}}" min=0 >
                                  </div>

                                  <div class="col-1 offset-md-11">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                  </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

       

@endsection