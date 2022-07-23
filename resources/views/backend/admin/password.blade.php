@extends('backend.master')

@section('title')
    Ganti Password
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Ganti Password</h4>
                        
       
                        @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <ul>
            @foreach ($errors->all() as $error)
                <li><i class=""></i> {{ $error }}</li>
            @endforeach 
        </ul>
    </div>
@endif
                        <form action="{{ route('admin.password.update') }}" method="post">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Password Sekarang</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name="old_password"  id="old_password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Password Baru</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name="new_password" id="new_password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Password Baru Konfirmasi</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name="confirm_password" id="confirm_password">
                            </div>
                        </div>

                                 <!-- end row -->
                        <input type="submit" class="btn btn-outline-primary waves-effect waves-light" value="Update Password">

                        <!-- end row -->
                    </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    
</div>



@endsection
