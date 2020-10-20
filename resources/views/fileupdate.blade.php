@extends('layouts.header')
@section('content')

<div class="page-inner">
    <div class="page-header">

        <h4 class="page-title">Files</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home cursorpoint"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">

                <a href="#" class="cursorpoint">Create File</a>

            </li>
        </ul>
    </div>
</div>
<div class="page-inner mt--12">
    <div class="row mt--12">
        <!-- <div class="row"> -->
        <div class="col-md-12">
            <form role="form" method="post" action="{{ route('createnew') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Create File<span style="float: right;">
                                <a href="/streetview" class="btn btn-primary" style="color:#fff;">Lastest File
                                    View</a></span></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">

                                <div class="form-group form-inline">
                                    <div class="col-md-3">
                                        <label for="inlineinput">Refernce Number</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="data[files][file_refno]"
                                            placeholder="Enter Your Refernce Number"
                                            value="{{$fileupdated_data->file_refno}}" class="form-control input-full"
                                            id="fileinput" style="margin-bottom:10px" required>
                                    </div>

                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-md-3">
                                        <label for="inlineinput">File Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="data[files][file_name]"
                                            placeholder="Enter Your Subject" value="{{$fileupdated_data->file_name}}"
                                            class="form-control input-full" id="subjectinput" style="margin-bottom:10px"
                                            required>
                                    </div>

                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-md-3">
                                        <label for="inlineinput">Subject</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="data[files][file_subject]"
                                            placeholder="Enter Your Subject" value="{{$fileupdated_data->file_subject}}"
                                            class="form-control input-full" id="subjectinput" style="margin-bottom:10px"
                                            required>
                                    </div>

                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-md-3">
                                        <label for="inlineinput">File Attachment</label>
                                    </div>
                                    <!-- <div class="col-md-9">
                                        <input type="text" name="data[form][subject]" placeholder="Enter Your Subject"
                                            value="" class="form-control input-full" id="subjectinput"
                                            style="margin-bottom:10px" required>
                                    </div> -->

                                    <div class="col-md-9">
                                        <div class="input-group control-group increment">
                                            <input type="file" name="file_upload[]" class="form-control">
                                            <div class="input-group-btn">
                                                <button class="btn btn-success" type="button" style="height: 49px;"><i
                                                        class="glyphicon glyphicon-plus"></i>Add</button>
                                            </div>
                                        </div>
                                        <div class="clone hide">
                                            <div class="control-group input-group" style="margin-top:10px">
                                                <input type="file" name="file_upload[]" class="form-control">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger" type="button"
                                                        style="height: 49px;"><i class="glyphicon glyphicon-remove"></i>
                                                        Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-md-3">
                                        <label for="inlineinput">Assigned To </label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control input-full" name="data[files][assigned_to]"
                                            id="assigned_person">
                                            <option value="" disabled selected hidden>choose</option>
                                            @foreach($officer as $key => $value)
                                            <option @if($fileupdated_data->assigned_to == $key) selected="selected" @endif
                                                value="{{ $key }}"> {{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-md-3">
                                        <label for="inlineinput">Change Status </label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control input-full" name="data[files][file_status]"
                                            id="file_status">
                                            <option value="" disabled selected hidden>choose</option>
                                            @foreach($statuses as $key => $value)
                                            <option value="{{ $key }}"> {{ $value->status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group form-inline">
                                    <div class="col-md-3">
                                        <label for="inlineinput">Discription</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea class="form-control input-full" id="comment"
                                            name="data[files][description]" rows="5" spellcheck="false">{{$fileupdated_data->description}}
									</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <div style="float:right;">
                            <input type="text" value="{{$fileupdated_data->id}}" name="data[files][edit_id]">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="#" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection('content')
@section('footer')
<script type="text/javascript">
$(document).ready(function() {
    $(".btn-success").click(function() {
        var html = $(".clone").html();
        $(".increment").after(html);
    });
    $("body").on("click", ".btn-danger", function() {
        $(this).parents(".control-group").remove();
    });
});
</script>

@endsection('footer')