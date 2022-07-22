@extends('backend.master')

@section('title')
    Edit Profile
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Profile</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">ZeroPorto</a></li>
                            <li class="breadcrumb-item active">Edit Profile</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="mt-4 mt-md-0 text-center"> <br><br>
                        <img class="rounded-circle avatar-xl" alt="200x200" src="{{ (!empty($profile->foto) ? asset($profile->foto) : asset('upload/no_image.jpg')) }}" data-holder-rendered="true">
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive table-borderless">
                            <tr >
                                <td width="20%">Name</td>
                                <td>:</td>
                                <td class="card-title"><b>{{ $profile->name }}</b> </td>
                                
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td class="card-title"><b>{{ $profile->email }}</b> </td>
                                
                            </tr>

                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td class="card-title"><b>{{ $profile->username }}</b> </td>
                                
                            </tr>
                        </table>
                        <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary btn-rounded waves-effect waves-light">Edit Profile</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- end row -->
    </div>
    
</div>
@endsection