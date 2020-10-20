@extends('layouts.header')

@section('content')
<style>
.modal-backdrop {
    opacity: 0.5 !important;
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
@endsection('content')