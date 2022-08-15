@extends('backend.master')

@section('title')
    Home Slide
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Update Home Slide</h4> <br><br>
       
                        @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
     <ul>
    @foreach ($errors->all() as $error)
      
        <li>{{ $error }}</li>
    @endforeach
    </ul>        
        
    </div>
@endif
                        <form action="{{ route('admin.homeslide.update') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" value="{{ $data->id }}" name="id">
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="title" id="example-text-input" value="{{ $data->title }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="deskripsi" id="example-text-input" value="{{ $data->deskripsi }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Youtube URL</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="video_url" id="example-text-input" value="{{ $data->video_url }}">
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