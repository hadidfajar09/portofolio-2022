@extends('backend.master')

@section('title')
    Footer Setup
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Update Footer Setup</h4> <br><br>
       
                        @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
     <ul>
    @foreach ($errors->all() as $error)
      
        <li>{{ $error }}</li>
    @endforeach
    </ul>        
        
    </div>
@endif
                        <form action="{{ route('admin.setting.update') }}" method="post">
                        @csrf

                        <input type="hidden" value="{{ $data->id }}" name="id">
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="phone" id="example-text-input" value="{{ $data->phone }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="short_description" id="example-text-input" value="{{ $data->short_description	 }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Country</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="country" id="example-text-input" value="{{ $data->country }}">
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="address" id="example-text-input" value="{{ $data->address }}">
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="email" id="example-text-input" value="{{ $data->email }}">
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Country</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="country" id="example-text-input" value="{{ $data->country }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Intro Sosial</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="intro_sosial" id="example-text-input" value="{{ $data->intro_sosial }}">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Instagram</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="instagram" id="example-text-input" value="{{ $data->instagram }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="facebook" id="example-text-input" value="{{ $data->facebook }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="twitter" id="example-text-input" value="{{ $data->twitter }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Github</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="github" id="example-text-input" value="{{ $data->github }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Linkedin</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="linkedin" id="example-text-input" value="{{ $data->linkedin }}">
                            </div>
                        </div>
                 

                                 <!-- end row -->
                        <input type="submit" class="btn btn-outline-primary waves-effect waves-light" value="Update Data">

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


@push('scripts')

@endpush