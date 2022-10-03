@extends('backend.master')

@section('title')
    About Setup
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">

        {{-- tessadas --}}
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Update About</h4> <br><br>
       
                        @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
     <ul>
    @foreach ($errors->all() as $error)
      
        <li>{{ $error }}</li>
    @endforeach
    </ul>        
        
    </div>
@endif
                        <form action="{{ route('admin.about.update') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" value="{{ $data->id }}" name="id">
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="title" id="example-text-input" value="{{ $data->title }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="short_title" id="example-text-input" value="{{ $data->short_title }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea required="" name="short_deskripsi" class="form-control" rows="5">{{ $data->short_deskripsi }}</textarea>
                               
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Long Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="long_deskripsi">{{ $data->long_deskripsi }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Upload Thumbanail</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="image" id="image" placeholder="Artisanal kale" id="example-text-input" value="{{ $data->image }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img class="rounded avatar-xl" id="showImage" alt="200x200" src="{{ (!empty($data->image) ? asset($data->image) : asset('upload/no_image.jpg')) }}" data-holder-rendered="true">
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
<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader()
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result)
            }
            reader.readAsDataURL(e.target.files['0'])
        })
    })
</script>
@endpush