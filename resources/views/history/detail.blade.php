@extends('layouts.app')
@section('title', 'GadgetOn | Cart')
@section('content')
    <div class="container">
        <div class="container mt-4 mb-4">
            <div class="col-md-12">
                <a href="{{ '/history' }}" class="btn btn-danger mb-3"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="col-md-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-danger text-decoration-none" href="{{ '/' }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-danger text-decoration-none" href="{{ '/history' }}">History</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout Detail</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3><i class="fa fa-shopping-cart"></i> History Detail </h3>
                            <p align="right">Order Date : {{ \Carbon\Carbon::parse($transact->transaction_date)->format('d F Y') }}</p>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Image</td>
                                    <td>Product Name</td>
                                    <td>Quantity</td>
                                    <td>Price (per unit)</td>
                                    <td>Total Price (per unit)</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $c)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="/upload/{{ $c->product->image_path }}" width="150" alt="{{ $c->product->name }}">
                                        </td>
                                        <td>{{ $c->product->name }}</td>
                                        <td>{{ $c->quantity }} unit</td>
                                        <td>Rp. {{number_format($c->product->price)}}</td>
                                        <td>Rp. {{number_format($c->total_price)}}</td>
                                    </tr>
                                @endforeach
                                    <tr class="bg-success">
                                        <td class="text-light" colspan="5" align="right"><strong>Total Price :</strong></td>
                                        <td class="text-light"><strong>Rp. {{ number_format($transact->total_price) }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

