@extends('layouts.app')
@section('title', 'GadgetOn | View Phone')
@section('content')
    <div class="container">
        <div class="container mt-4 mb-4">
            <div class="col-md-12">
                <a href="{{ '/home' }}" class="btn btn-danger mb-3"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="col-md-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-danger text-decoration-none" href="{{ '/home' }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3><i class="fa fa-shopping-cart"></i> Check Out </h3>
                        @if(!empty($transact))
                        <p align="right">Order Date : {{ $transact->transaction_date }}</p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Image</td>
                                    <td>Product Name</td>
                                    <td>Quantity</td>
                                    <td>Price (per unit)</td>
                                    <td>Total Price (per unit)</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($cart as $c)
                                   <tr>
                                       <td>{{ $no++ }}</td>
                                       <td>
                                           <img src="{{ $c->product->image_path }}" width="150" alt="{{ $c->product->name }}">
                                       </td>
                                       <td>{{ $c->product->name }}</td>
                                       <td>{{ $c->quantity }} unit</td>
                                       <td>Rp. {{number_format($c->product->price)}}</td>
                                       <td>Rp. {{number_format($c->total_price)}}</td>
                                       <td>
                                           <form action="{{ url('cart') }}/{{ $c->id }}" method="post">
                                               @csrf
                                               {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                           </form>
                                       </td>
                                   </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" align="right"><strong>Total Price :</strong></td>
                                    <td><strong>Rp. {{ number_format($transact->total_price) }}</strong></td>
                                    <td>
                                        <a href="{{ url('confirm-cart') }}" class="btn btn-success">
                                            <i class="fa fa-shopping-cart"></i> Check Out
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


