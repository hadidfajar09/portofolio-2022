@extends('auth.master')

@section('title')
    Reset Password
@endsection

@section('content')
<div class="wrapper-page">
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">

                <div class="text-center mt-4">
                    <div class="mb-1">
                        <a href="index.html" class="auth-logo">
                            <img src="{{ asset('backend/assets/images/glasstea.png') }}" height="70" class="logo-dark mx-auto" alt="">
                        </a>
                    </div>
                </div>

                <h4 class="text-muted text-center font-size-18"><b>Perbarui Password Anda</b></h4>

                <div class="p-3">
                    <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />

                    <form class="form-horizontal mt-3" action="{{ route('password.update') }}" method="post">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control" type="text" required="" name="email" value="{{ old('email', $request->email) }}" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control" type="password" name="password" required="" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control" type="password" name="password_confirmation" required="" placeholder="Konfirmasi Password">
                            </div>
                        </div>


                        <div class="form-group mb-3 text-center row mt-3 pt-1">
                            <div class="col-12">
                                <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Reset Password Anda</button>
                            </div>
                        </div>
              
                    </form>
                </div>
                <!-- end -->
            </div>
            <!-- end cardbody -->
        </div>
        <!-- end card -->
    </div>
    <!-- end container -->
</div>
@endsection