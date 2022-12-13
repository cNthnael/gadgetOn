@extends('layouts.app')
@section('title', 'GadgetOn | My Profile')
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
                        <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3><i class="fa fa-user"></i> My Profile </h3>
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            @role('admin')
                            <tr>
                                <td>Role</td>
                                <td>:</td>
                                <td>Admin</td>
                            </tr>
                            @endrole
                            @if(!\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                            <tr>
                                <td>Gender</td>
                                <td>:</td>
                                <td>{{ ucfirst($user->gender) }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            @if(!\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td>{{ $user->address }}</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-pencil-alt"></i> Edit Profile </h3>
                    <form method="POST" action="{{ url('profile') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-3 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if(!\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                        <div class="row mb-3">
                            <label for="" class="col-md-3 col-form-label text-md-end">{{ __('Gender') }}</label>
                            <div class="col-md-2" action="#">
                                <select class="form-control" name="gender" id="gender">
                                    <option value=null>Choose...</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        @endif

                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                            <div class="row mb-3">
                                <label for="email" class="col-md-3 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input readonly id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        @else
                            <div class="row mb-3">
                                <label for="email" class="col-md-3 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        @if(!\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                        <div class="row mb-3">
                            <label for="address" class="col-md-3 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" required>{{ $user->address }}</textarea>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endif

                        <div class="row mb-3">
                            <label for="password" class="col-md-3 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small id="passwordHelpInline" class="text-muted">
                                    Must be 5-12 characters long.
                                </small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                                <small id="passwordHelpInline" class="text-muted">
                                    Emptied 'Password' if nothing changed.
                                </small>
                            </div>
                        </div>

                        <div class="form-group row- mb-0" style="margin-top: 30px">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-danger">
                                    {{ ('Save Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


