@extends('backend.master')

@section('title')
    Multi Image Edit
@endsection
@section('content')

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Edit Multi Image</h4> <br><br>

            <form method="post" action="{{ route('update.multi.image', $multi->id) }}" enctype="multipart/form-data">
                @csrf


             <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">About Multi Image </label>
                <div class="col-sm-10">
           <input name="multi_image" class="form-control" type="file" id="image" >
                </div>
            </div>
            <!-- end row -->


              <div class="row mb-3">
                 <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                <div class="col-sm-10">
  <img id="showImage" class="rounded avatar-lg" src="{{  asset($multi->image) }}" alt="Card image cap">
                </div>
            </div>
            <!-- end row -->
<input type="submit" class="btn btn-info waves-effect waves-light" value="Update Multi Image">
            </form>



        </div>
    </div>
</div> <!-- end col -->
</div>



</div>
</div>



@endsection 

@push('scripts')
<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endpush