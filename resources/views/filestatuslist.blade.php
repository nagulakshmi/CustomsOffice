@extends('layouts.header')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <table>
                        <tr>
                            <th>Ref.No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                        @foreach($fileList as $file)
                        <tr>
                            <th>{{$file->file_refno}}</th>
                            <th>{{$file->file_name}}</th>
                            <th>{{$file->description}}</th>
                            <th>{{$file->file_status}}</th>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection