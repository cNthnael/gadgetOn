@extends('layouts.app')
@section('title', 'GadgetOn | Manage Product')
@section('content')
    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-md-12">
                <a href="{{ '/' }}" class="btn btn-danger mb-3"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="col-md-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-danger text-decoration-none" href="{{ '/' }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
                    </ol>
                </nav>
            </div>

            <!-- Content Here -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-4">Product Manager
                            <a href="{{ route('create') }}" class="btn btn-success mt-1 btn-sm text-white float-end shadow-sm"><i class="fa fa-plus"></i>
                                Add Product
                            </a>
                        </h3>
                        <table class="table">
                            <thead class="bg-success text-light">
                            <tr>
                                <td>No</td>
                                <td>Image</td>
                                <td>Product Name</td>
                                <td>Release Date</td>
                                <td>Price</td>
                                <td style="width: 200px;">Action</td>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            @foreach($products as $p)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <img src="/upload/{{ $p->image_path }}" width="150" alt="{{ $p->name }}">
                                </td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->release }}</td>
                                <td>Rp. {{number_format($p->price)}}</td>
                                <td class="d-flex justify-content-center border-0">
                                    <a href="{{ url(('update')) }}/{{ $p->id }}" class="btn btn-success btn-sm me-2"><i class="fa fa-pencil-alt"></i></a>
                                    <form action="{{ url('list') }}/{{ $p->id }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to remove this item from the list?');"><i class="fa fa-trash"></i></button>
                                    </form>
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
@endsection

