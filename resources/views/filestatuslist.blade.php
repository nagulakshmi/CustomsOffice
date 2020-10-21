@extends('layouts.header')

@section('content')
<style>
.modal-backdrop {
    opacity: 1 !important;
}
</style>
<div class="page-inner">
    <div class="page-header">
        <!-- <h4 class="page-title" style="margin-left:30px;">User Management</h4> -->

        <h4 class="page-title">File Management</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>


            @if(request()->query('status_id') == 1)
            <li class="nav-item">
                <a href="#">Latest File List</a>
            </li>
            @elseif(request()->query('status_id') == 2)
            <li class="nav-item">
                <a href="#">Inprogress File List</a>
            </li>
            @elseif(request()->query('status_id')== 3)
            <li class="nav-item">
                <a href="#">Closed File List</a>
            </li>
            @elseif(request()->query('status_id') == 4)
            <li class="nav-item">
                <a href="#">Rejected File List</a>
            </li>
            @elseif(request()->query('status_id') == 0)
            <li class="nav-item">
                <a href="#">Overall File List</a>
            </li>
            @endif
        </ul>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="row mt--2">
        @if(count($fileList)>0)
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover">
                            <thead>
                                <tr class="tr-styls">
                                    <th class="text-center">s.no</th>
                                    <th class="text-center">Ref.no</th>
                                    <th class="text-center">File name</th>
                                    <th class="text-center">file subject</th>
                                    <th class="text-center">Assigned officer</th>
                                    <th class="text-center">description</th>
                                    <th class="text-center">status</th>
                                    <th class="text-center">action</th>
                                    <!-- <th class="text-center">Status</th> -->
                                </tr>
                            </thead>

                            <tbody>

                                @php $sno =1; @endphp
                                @foreach ($fileList as $item)
                                <tr>
                                    <td>{{$sno}}</td>
                                    <td>{{$item->file_refno}}</td>
                                    <td>{{$item->file_name}}</td>
                                    <td>{{$item->file_subject}}</td>
                                    <td>{{$item->assigned_to}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{($item->file_status == 4) ? "Rejected" : ( ($item->file_status == 3) ? "closed": ( ($item->file_status == 2) ? "Inprogess"  : " new") ) }}
                                    </td>
                                    <td>&nbsp
                                        &nbsp
                                        <a href="{{ url('/filedata/edit', $item->id) }}"><i class="fas fa-pen-square"
                                                aria-hidden="true"></i></a>
                                        <!-- <button type="button" class="btn btn-primary" id="myBtn">Open Modal</button> -->
                                        <a href="#"  data-id="<?php echo $item->id; ?>" data-title="delete"
                                            aria-hidden="true" data-toggle="modal" data-target="#deletefiledetail"><i
                                                class="fas fa-trash" aria-hidden="true"></i></a>
                                    </td>

                                    </td>
                                </tr>
                                @php $sno++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4> No Record Found </h4>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<div class="col-md-12">
    <p style="margin-left:2%;">Total Count : {{ count($fileList) }} </p>
    <div style="float:right">
        {{ $fileList->appends(['status_id' => request()->query('status_id') ])->links() }}
    </div>
</div>

<!-- DELETE Modal -->
<!-- Modal -->
<!-- <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
     Modal content
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modal Header</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>The <strong>show.bs.modal</strong> event occurs when the modal is about to be shown.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
</div> -->
<div id="deletefiledetail" class="modal" tabindex="1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete Message</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="delete-form">
                </form>
                <p id="delete-name">Are you sure do you want to delete File?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="btn-delete">Delete</button>
            </div>
        </div>
    </div>
</div>

@endsection('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

@section('footer')
<script>
$(document).ready(function() {

    // $("#delete-file").click(function() {
    //     $("#myDeleteModal").modal("show");
    // });
    $("#deletefiledetail").on('show.bs.modal', function(e) {

        // var id = $(e.relatedTarget).data('id');
        let id = $(this).attr('data-id');
        // $("#delete-form").attr("action", "{{ url('/filedata/delete/') }}" + "/" + id);
        $("form#delete-form").attr("action", "/filedata/delete/" + id);
        $("form#delete-form").attr("method", "GET");
    });

    $("#btn-delete").click(function() {
        $("#deletestreet-form").submit();
        swal("Good job!", "successfully deleted!", {
            icon: "success",
            buttons: {
                confirm: {
                    className: 'btn btn-success'
                }
            },
        });
    });
});
</script>
@endsection('footer')