@extends('auth.master')

@section('title')
    Verifikasi Email Anda
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


                <h4 class="text-muted text-center font-size-18"><b>Verifikasi Akun Anda di Inbox Email </b></h4>

                <div class="p-3">
                    <form class="form-horizontal mt-3" action="{{ route('verification.send') }}" method="post">
                        @csrf
                       

                        <div class="form-group pb-2 text-center row mt-3">
                            <div class="col-6">
                                <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Kirim Ulang</button>
                            </div>
                        </form>
                            <div class="col-6">
                                <a class="btn btn-info w-100 waves-effect waves-light" href="{{ route('admin.logout') }}">Logout</a>
                            </div>
                        </div>
                </div>
            </div>
            <!-- end cardbody -->
        </div>
        <!-- end card -->
    </div>
    <!-- end container -->
</div>
@endsection