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
            <form role="form" method="post" action="/poststreet">
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
                                        <input type="text" name="data[form][file_no]"
                                            placeholder="Enter Your Refernce Number" value=""
                                            class="form-control input-full" id="fileinput" style="margin-bottom:10px"
                                            required>
                                    </div>

                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-md-3">
                                        <label for="inlineinput">Subject</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="data[form][subject]" placeholder="Enter Your Subject"
                                            value="" class="form-control input-full" id="subjectinput"
                                            style="margin-bottom:10px" required>
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
                                            <input type="file" name="filename[]" class="form-control">
                                            <div class="input-group-btn">
                                                <button class="btn btn-success" type="button" style="height: 49px;"><i
                                                        class="glyphicon glyphicon-plus"></i>Add</button>
                                            </div>
                                        </div>
                                        <div class="clone hide">
                                            <div class="control-group input-group" style="margin-top:10px">
                                                <input type="file" name="filename[]" class="form-control">
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
                                        <select class="form-control input-full" id="exampleFormControlSelect1">
                                            <option>Officer1</option>
                                            <option>Officer2</option>
                                            <option>Officer3</option>
                                            <option>Officer4</option>
                                            <option>Officer5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-md-3">
                                        <label for="inlineinput">Discription</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea class="form-control input-full" id="comment" rows="5" spellcheck="false">
									</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <div style="float:right;">

                            <input type="hidden" value="" name="data[street_id]">
                            <button type="submit" class="btn btn-success">Submit</button>


                            <a href="/lastestfilelist" class="btn btn-danger">Cancel</a>
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