@extends('layouts/backend')

@section('title')
    Customer Dashboard
@endsection

@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Customer Dashboard</h5>
                        <hr>
                        @include('partial.flash')
                        @include("partial.error")
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection