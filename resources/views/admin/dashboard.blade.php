@extends('layouts/backend')

@section('title')
    Admin Dashboard
@endsection

@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Customer List</h5>
                        <hr>
                        @include('partial.flash')
                        @include("partial.error")
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Details</th>
                                        <th>Customer Image</th>
                                        <th>Customer Status</th>
                                        <th class="text-center" style="width: 130px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $customer)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->details}}</td>
                                        <td class="text-center">
                                            @if($customer->avatar)
                                            <img src="{{ asset('avatars/' . $customer->avatar) }}" alt="" class="w-px-40 h-auto rounded-circle" />
                                            @else
                                            <img src="{{url('assets/img/avatar.png')}}" alt="" class="w-px-40 h-auto rounded-circle" />
                                            @endif
                                        </td>
                                        <td>
                                            @if($customer->is_disabled == 1)
                                            <span class="badge bg-danger">Disabled</span>
                                            @else
                                            <span class="badge bg-success">Enabled</span>
                                            @endif
                                        </td>
                                        <td class="text-center ">
                                            <a href="{{route('admin.customer.edit', $customer->id)}}" class="btn btn-primary btn-sm"><i class='bx bx-edit-alt'></i></a>
                                            <a onclick="return confirm('Are you sure you want to delete this customer?')" href="{{route('admin.customer.delete', $customer->id)}}" class="btn btn-danger btn-sm"><i class='bx bx-trash'></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection