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
                        <table class="table table-bordered">
                            <tr>
                                <td><strong> Name:</strong></td>
                                <td>{{ $data['name'] }}</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td>{{ $data['email'] }}</td>
                            </tr>
                            <tr>
                                <td><strong>Details:</strong></td>
                                <td>{{ $data['details'] }}</td>
                            </tr>
                            <tr>
                                <td><strong>Avatar:</strong></td>
                                <td><img src="{{ asset('avatars/' . $data['avatar']) }}" alt="{{ $data['name'] }}" width="100px" height="100px"></td>
                            </tr>
                        </table>
                        <div class="mt-5 text-center">
                            {!! $share_buttons !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection