@extends('backend.master')

@section('title')
    Edit Blog
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" >
@endpush

@section('content')
<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        padding: 2px;
        background-color: rgba(88, 202, 139, 0.637);
        color: #ffffff;
        font-weight: 700px;
        border-radius: 15%;
    } 
</style>

<div class="page-content">
    <div class="container-fluid">

        {{-- tessadas --}}
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Blog</h4> <br><br>
       
                        @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
     <ul>
    @foreach ($errors->all() as $error)
      
        <li>{{ $error }}</li>
    @endforeach
    </ul>        
        
    </div>
@endif
                        <form action="{{ route('admin.blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select name="category_id" class="form-select" aria-label="Default select example">
                                    <option selected="" disabled>Open this select Category</option>
                                    @foreach ($category as $item)
                                        
                                    <option value="{{ $item->id }}" {{ $item->id == $blog->category_id ? 'selected' : '' }}>{{ $item->category_name }}</option>
                                    @endforeach
                                   
                                    </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="title" id="example-text-input" value="{{ $blog->title }}">
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="description">{{ $blog->description }}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Tags</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $blog->tag }}" name="tag" data-role="tagsinput">
                                @error('tag')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Upload Thumbnail</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="image" id="image" placeholder="Thumbnail" id="example-text-input">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img class="rounded avatar-xl" id="showImage" alt="200x200" src="{{ asset($blog->image) }}" data-holder-rendered="true">
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

<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js" ></script>
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