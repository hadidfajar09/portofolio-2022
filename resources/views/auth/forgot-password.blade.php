@extends('auth.master')

@section('title')
    Login
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


                <h4 class="text-muted text-center font-size-18"><b>Reset Password</b></h4>

                <div class="p-3">
                    <x-auth-session-status class="mb-4 text-danger text-size-24" :status="session('status')" />
                    <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />
                    <form class="form-horizontal mt-3" action="{{ route('password.email') }}" method="post">
                      @csrf
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                        Masukkan <strong>E-mail</strong> Email anda kemudian cek di inbox anda!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <div class="form-group mb-3">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" required=""  name="email" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group pb-2 text-center row mt-3">
                            <div class="col-12">
                                <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Send Email</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end cardbody -->
        </div>
        <!-- end card -->
    </div>
    <!-- end container -->
</div>
@endsection