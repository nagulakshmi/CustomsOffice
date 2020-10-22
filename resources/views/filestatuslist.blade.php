@extends('layouts.header')

@section('content')
<style>
.modal-backdrop {
    opacity: 1 !important;
}
</style>
<div class="page-inner">
    <div class="page-header">
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
<div id="search">
    <form id="searchform" role="form" method="GET" action="/filestatuslist?status_id=0" autocomplete="off"
        enctype="multipart/form-data">
        <!-- {{ csrf_field() }} -->

        <div class="page-inner mt--12">
            <div class="row mt--12">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header">
                            <div class="card-title"><b>File List Search</b></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2 has-calendar">
                                    <label for="inlineinput" class="col-md-1 ">From Date</label>
                                    <div class="col-md-11">
                                        <span class="fa fa-calendar form-control-feedback"></span>
                                        <input type="text" class="form-control datepickersm" name="fromdate"
                                            id="fromdatesearch" placeholder="From Date" value="">
                                    </div>
                                </div>
                                <div class="form-group col-md-2 has-calendar">
                                    <label for="inlineinput" class="col-md-1 ">To Date</label>
                                    <div class="col-md-11 ">
                                        <span class="fa fa-calendar  form-control-feedback"></span>
                                        <input type="text" class="form-control datepickersm" name="todate"
                                            id="todatesearch" placeholder="To Date" value="">
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-md-1">Status</label>
                                    <select class="form-control input-full" name="assigned_to" id="assigned_person">
                                        <option value="" disabled selected hidden>choose</option>
                                        @foreach($officer as $key => $value)
                                        <option value="{{$value->id }}">{{ $value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3 has-search">
                                    <label class="col-md-1">Search </label>
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" class="form-control" placeholder="Search"
                                        name="searchkey">
                                </div>

                                <div class="form-group col-md-1">
                                    <label class="col-md-1">
                                        <p> </p>
                                    </label>
                                    <div class="col-md-1 ">
                                        <a class="col-md-11">
                                            <button type="submit" id="btnall" class="btn btn-sm btn-success">
                                                <i class="fas fa-search"></i></button></a>
                                    </div>
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="col-md-1">
                                        <p> </p>
                                    </label>
                                    <div class="col-md-1 ">
                                        <a href="/filestatuslist?status_id=0" class="col-md-11"><button type="button"
                                                class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button></a>
                                        <input type="hidden" value="" id="resval">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="page-inner mt--5">
    <div class="row mt--2">
        @if(count($fileList)>0)
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><b>Overall FileList</b></div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover">
                            <thead>
                                <tr class="tr-styls">
                                    <th>s.no</th>
                                    <th>Ref.no</th>
                                    <th>File name</th>
                                    <th>file subject</th>
                                    <th>Assigned officer</th>
                                    <th>description</th>
                                    <th>status</th>
                                    <th>action</th>
                                    <!-- <th >Status</th> -->
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
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{($item->file_status == 4) ? "Rejected" : ( ($item->file_status == 3) ? "closed": ( ($item->file_status == 2) ? "Inprogess"  : " new") ) }}
                                    </td>
                                    <td>&nbsp
                                        &nbsp
                                        <a href="{{ url('/filedata/edit', $item->id) }}"><i class="fas fa-pen-square"
                                                aria-hidden="true"></i></a>
                                        <a href="#" data-id="<?php echo $item->id; ?>" data-title="delete"
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

<div id="deletefiledetail" class="modal fade" tabindex="1" role="dialog" data-backdrop="static" data-keyboard="false">
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

@section('footer')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
<script>
$(".datepickersm").datepicker({
    dateFormat: 'dd-mm-yy', //check change
    changeMonth: true,
    changeYear: true
});


$(document).ready(function() {

    $("#search").hide();

    $.urlParam = function(name) {
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results == null) {
            return null;
        }
        return decodeURI(results[1]) || 0;
    }
    console.log($.urlParam('status_id'));
    if ($.urlParam('status_id') == 0 || ('status_id') == ? ) {
        $("#search").show();
    }


    $("#deletefiledetail").on('show.bs.modal', function(e) {

        var id = $(e.relatedTarget).data('id');
        $("form#delete-form").attr("action", "/filedata/delete/" + id);
        $("form#delete-form").attr("method", "GET");
    });

    $("#btn-delete").click(function() {
        $("#delete-form").submit();
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