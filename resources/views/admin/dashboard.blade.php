@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-2">
            <h2>Hi, Admin!</h2>
        </div>
    </div>

    <div class="row">
        <div class="card">
            <div class="card-header">
              Products
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @include('admin.products_table')
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="card">
            <div class="card-header">
              Sales
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @include('admin.sales_table')
                    </div>
                </div>
                
            </div>
        </div>

    </div>



@endsection