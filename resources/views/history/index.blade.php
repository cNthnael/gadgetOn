@extends('layouts.app')
@section('title', 'GadgetOn | History')
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
                        <li class="breadcrumb-item active" aria-current="page">History</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3><i class="fa fa-history"></i> History </h3>
                        @if(!empty($transact))
                        <table class=" table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Checkout Date</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                                @foreach($transact as $t)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ \Carbon\Carbon::now()->format('d F Y') }}</td>
                                        <td>Rp. {{ number_format($t->total_price) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <div class="row justify-content-lg-center">
                                <div class="col-md-12 mt-3 mb-2">
                                    <h4 class="text" style="text-align: center">No History!</h4>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


