@extends('backend.master')

@section('title')
    Edit Category
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">

        {{-- tessadas --}}
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Category</h4> <br><br>
       
                        @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
     <ul>
    @foreach ($errors->all() as $error)
      
        <li>{{ $error }}</li>
    @endforeach
    </ul>        
        
    </div>
@endif
                        <form action="{{ route('admin.category.update', $category->id) }}" method="post">
                        @csrf

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="category_name" id="example-text-input" value="{{ $category->category_name }}">
                                @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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