@extends('layouts.app')
@section('title', 'GadgetOn | Create Product')
@section('content')
    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-md-12">
                <a href="{{ 'list' }}" class="btn btn-danger mb-3"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="col-md-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-danger text-decoration-none" href="{{ '/' }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-danger text-decoration-none" href="{{ 'list' }}">Product Manager</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Product</li>
                    </ol>
                </nav>
            </div>

            <!-- Content Here -->
            <div class="container mt-4 mb-4">
                <div class="card">
                    <div class="card-body">

                        @if($errors->any())
                            <div class="alert alert-warning">
                                @foreach($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <h3><i class="fa fa-plus mb-3"></i> Create Product </h3>
                        <form action="{{ route('store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Product Name </label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="release"> Release </label>
                                <input id="release" type="text" class="form-control @error('release') is-invalid @enderror" name="release"
                                       value="{{ old('release') }}" required autocomplete="'release" autofocus placeholder="Year, Month Day">

                                @error('release')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3 pt-3">
                                <label for="desc">Description</label>
                                <textarea id="desc" type="text" rows="3" class="form-control @error('desc') is-invalid @enderror" name="desc"
                                          value="{{ old('desc') }}" required autocomplete="desc" autofocus></textarea>

                                @error('desc')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="price">Price <span class="text-muted">(in Rupiah)</span></label>
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                                       value="{{ old('price') }}" required autocomplete="price" autofocus min="0" step="0.01" placeholder="Rp. ">

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="image_path">Image Link </label>
                                <input id="image_path" type="text" class="form-control @error('image_path') is-invalid @enderror" name="image_path"
                                       value="{{ old('image_path') }}" required autocomplete="image_pathe" autofocus min="0" step="0.01" placeholder=".jpg/.png ">

                                @error('image_path')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

{{--                            <div class="input-group mb-4">--}}
{{--                                <div class="custom-file">--}}
{{--                                    <input type="file" class="custom-file-input" id="image_path" aria-describedby="image_path">--}}
{{--                                    <label class="custom-file-label" for="image_path"></label>--}}
{{--                                    @error('image_path')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-lg px-5 shadow">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

