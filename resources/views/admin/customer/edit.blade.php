@extends('layouts/backend')

@section('title')
Edit Customer
@endsection

@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Edit Customer</h5>
                        <hr>
                        @include('partial.flash')
                        @include("partial.error")
                        <form action="{{route('admin.customer.update', $customer->id)}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="is_disabled" class="form-label">Customer Status</label>
                                <select class="form-select" aria-label="Default select example" name="is_disabled">
                                    <option value="0" @if($customer->is_disabled == 0) selected @endif>Enabled</option>
                                    <option value="1" @if($customer->is_disabled == 1) selected @endif>Disabled</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection