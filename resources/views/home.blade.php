@extends('layouts.app')
@section('title', 'GadgetOn | Home')
@section('content')
<div class="container">
    <div class="row justify-content-lg-center">
        <div class="col-md-12 mt-3 mb-2">
            <h1 class="text-danger" style="text-align: center">Our Products</h1>
        </div>

        <!-- Content Here -->
        @foreach($products as $p)
            <div class="col-md-4 mt-4">
                <div class="card h-100" style="width: 100%" >
                    <img src="/upload/{{ $p->image_path }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$p->name}}</h5>
                        <p class="card-text"><strong>Price : </strong> Rp. {{number_format($p->price)}}</p>
                        <a href="{{ url('detail') }}/{{ $p->id }}" class="btn btn-danger">See Detail</i></a>
                    </div>

                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection

