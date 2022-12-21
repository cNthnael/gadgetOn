@extends('layouts.app')
@section('title', 'GadgetOn | Manage Product')
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
                        <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
                    </ol>
                </nav>
            </div>

            <!-- Content Here -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-5"><i class="fa fa-plus"></i> Add Product</h3>
                        <table class="table table-striped">

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

