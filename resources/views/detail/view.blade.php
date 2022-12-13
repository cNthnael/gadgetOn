@extends('layouts.app')
@section('title', 'GadgetOn | View Phone')
@section('content')
    <div class="container">
        <div class="container mt-4 mb-4">
            <div class="col-md-12">
                <a href="{{ '/' }}" class="btn btn-danger mb-3"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="col-md-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-danger text-decoration-none" href="{{ '/' }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $detail->name }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6 ">
                                        <img src="{{ $detail-> image_path }}" class="rounded mx-auto d-block" width="100%" alt="...">
                                    </div>
                                        <div class="col-md-6">
                                            <h4>{{ $detail->name }}</h4>
                                            <h4 style="color: orangered">Rp. {{number_format($detail->price)}}</h4>
                                            <table class="table">
                                                <tbody>
                                                        <br>
                                                        <h5>{{ $detail->release }}</h5>
                                                        <p>{{ $detail->desc }}</p>

                                                        @if(!\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                                                    <form action="{{ url(('detail')) }}/{{ $detail->id }}" method="post">
                                                        <h6>Quantity : </h6>
                                                        @csrf
                                                        <p><input type="text" name="quantity" class="form-control" required=""></p>
                                                        <button type="submit" class="btn btn-danger">Add to <i class="fa fa-shopping-cart"></i></button>
                                                    </form>
                                                        @else
                                                                @csrf
                                                                <button href="#" class="btn btn-success me-2">Update Detail</button>
                                                                <button href="#" class="btn btn-danger" onclick="return confirm('Do you want to remove this item from the cart?');">Delete Phone</button>
                                                            </form>
                                                        @endif
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection


