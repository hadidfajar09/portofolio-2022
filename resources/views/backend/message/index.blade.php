@extends('backend.master')

@section('title')
    All Messages
@endsection
@section('content')

@push('css')
     <!-- DataTables -->
     <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('backend/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- Responsive datatable examples -->
     <link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />  
@endpush

<div class="page-content">
<div class="container-fluid">
 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Portfolio</h4>
                   

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                           
                        </tr>
                        </thead>


                        <tbody>
                        	@php($i = 1)
                        	@foreach($message as $item)
                        <tr>
                            <td> {{ $i++}} </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->subject }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->message }}</td>
                            <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>

                            <td> 
                            <a href="{{ route('delete.message', $item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

                            </td>

                        </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



</div>
</div>



@endsection 

@push('scripts')

   <!-- Required datatable js -->
   <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
   <!-- Buttons examples -->
   <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
   <script src="{{ asset('backend/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
   <script src="{{ asset('backend/assets/libs/jszip/jszip.min.js') }}"></script>
   <script src="{{ asset('backend/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
   <script src="{{ asset('backend/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
   <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
   <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
   <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

   <script src="{{ asset('backend/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
   <script src="{{ asset('backend/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
   
   <!-- Responsive examples -->
   <script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
   <script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

   <!-- Datatable init js -->
   <script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script>

@endpush