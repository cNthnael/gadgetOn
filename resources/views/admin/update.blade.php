@extends('layouts.app')
@section('title', 'GadgetOn | Edit Product')
@section('content')
    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-md-12">
                <a href="{{ route('list') }}" class="btn btn-danger mb-3"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="col-md-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-danger text-decoration-none" href="{{ '/' }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-danger text-decoration-none" href="{{ 'list' }}">Product Manager</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $products->name }}</li>
                    </ol>
                </nav>
            </div>

            <!-- Content Here -->
            <div class="container mt-2 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3><i class="fa fa-pencil-alt mb-3"></i> Edit Product </h3>
                        <form action="{{ url('update') }}/{{ $products->id }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Product Name </label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ $products->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="release"> Release </label>
                                <input id="release" type="text" class="form-control @error('release') is-invalid @enderror" name="release"
                                       value="{{ $products->release }}" required autocomplete="'release" autofocus placeholder="Year, Month Day">

                                @error('release')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3 pt-3">
                                <label for="desc">Description</label>
                                <textarea id="desc" type="text" rows="3" class="form-control @error('desc') is-invalid @enderror" name="desc"
                                          required autocomplete="desc" autofocus>{{ $products->desc }}</textarea>

                                @error('desc')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="price">Price <span class="text-muted">(in Rupiah)</span></label>
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                                       value="{{ ($products->price) }}" required autocomplete="price" autofocus min="0" step="0.01" >

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group mb-3 md-6">
                                <div class="col-md-3">
                                    <input type="file" class="form-control" id="image_path" name="image_path" value="{{ $products->image_path }}">
                                    <small id="passwordHelpInline" class="text-muted">
                                        Add Image (required).
                                    </small>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-lg px-5 shadow">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

