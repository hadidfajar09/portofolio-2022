@extends('auth.master')

@section('title')
    Register
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

                <h4 class="text-muted text-center font-size-18"><b>Daftar</b></h4>

                <div class="p-3">
                    <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />
                    <form class="form-horizontal mt-3" action="{{ route('register') }}" method="post">
                          @csrf

                          <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control" type="text" required="" name="name" placeholder="Name">
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control" type="email" name="email" required="" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control" type="text" name="username" required="" placeholder="Username">
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

                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="form-label ms-1 fw-normal" for="customCheck1">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center row mt-3 pt-1">
                            <div class="col-12">
                                <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Daftar Sekarang</button>
                            </div>
                        </div>

                        <div class="form-group mt-2 mb-0 row">
                            <div class="col-12 mt-3 text-center">
                                <a href="{{ route('login') }}" class="text-muted">Sudah Punya Akun?</a>
                            </div>
                        </div>
                    </form>
                    <!-- end form -->
                </div>
            </div>
            <!-- end cardbody -->
        </div>
        <!-- end card -->
    </div>
    <!-- end container -->
</div>
@endsection