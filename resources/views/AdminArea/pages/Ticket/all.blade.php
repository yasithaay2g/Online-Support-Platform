@extends('AdminArea/layouts.app-common')

@section('header')
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-black d-inline-block mb-0">Tickets Management</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboards</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tickets Management<</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{ route('tickets.create')}}" class="btn btn-sm btn-info"><i class="ni ni-fat-add"></i>Add
                        New</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            @if(session()->has('success'))
            <center>
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
            </center>
            @endif
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">#</th>
                                <th scope="col" class="sort" data-sort="budget">Referance No</th>
                                <th scope="col" class="sort" data-sort="budget">Name</th>                          
                                <th scope="col" class="sort" data-sort="status">Status</th>
                                <th scope="col">Created Date</th>
                                <th scope="col" class="sort" data-sort="completion">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($tickets as $ticket)
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">

                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">{{$ticket->id}}</span>
                                        </div>
                                    </div>
                                </th>
                                <td class="budget">
                                    {{$ticket->ref_no }}
                                </td>
                                <td>
                                    {{$ticket->name}}<br>
                                    {{$ticket->email}}
                                </td>                        
                                <td>
                                    @if($ticket->status==1)
                                    <span class="badge badge-pill badge-success">Open</span>
                                    @elseif($ticket->status==0)
                                    <span class="badge badge-pill badge-primary">Pending</span>
                                    @endif
                                </td>
                                <td> {{Carbon\Carbon::parse($ticket->created_at)->format('d F y h:i a')}}</td>
                               <td>
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">                                        
                                            <a class="dropdown-item" href="{{route('tickets.view',$ticket->id)}}">
                                                <i class="fa fa-eye  text-success"></i>&nbsp;Open
                                            </a>
                                       
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                 
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('.table').DataTable({
            language: {
                paginate: {
                    next: '<i class="ni ni-bold-right"></i>',
                    previous: '<i class="ni ni-bold-left"></i>'
                }
            },
        });
    });

    function delconf(url, title = "Do You Want To Remove This!") {
        $.confirm({
            title: 'Are You Sure,',
            content: title,
            autoClose: 'cancel|8000',
            type: 'red',
            confirmButton: "Yes",
            cancelButton: "Cancel",
            theme: 'material',
            backgroundDismiss: false,
            backgroundDismissAnimation: 'glow',
            buttons: {
                'Yes, Delete IT': function () {
                    window.location.href = url;
                    confirmButton: "Yes";
                    cancelButton: "Cancel";
                },
                cancel: function () {

                },

            }
        });
    }

    $(".alert").delay(3500).slideUp(200, function () {
        $(this).alert('close');
    });

</script>
@endsection
