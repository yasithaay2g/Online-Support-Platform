@extends('PublicArea/layouts/app-common')

@section('header')
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-black d-inline-block mb-0">Support Ticket</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>

                            <li class="breadcrumb-item active" aria-current="page">Tickets Management</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">

                    <button type="button" class=" btn btn-sm btn-neutral float-right" data-toggle="modal"
                        data-target=".bs-example-modal-sm"> <i class="fas fa-plus-circle"></i>&nbsp; Add New
                    </button>
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
                                <th scope="col" class="sort" data-sort="budget">Name</th>
                                <th scope="col" class="sort" data-sort="status">Status</th>
                                <th scope="col">Created Date</th>
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

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="mySmallModalLabel">Create Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ml-2">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('customer-tickets.store')}}" method="POST" id="form1" class="form_modal">
                            @csrf

                            <div class="row">

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username"> Name</label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                                            value="" required>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Contact Number</label>
                                        <input type="number" id="phone" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="phone" value="" required>
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Email<span
                                                class="text-danger">*</span></label>
                                        <input type="email" onkeyup="checkEmail(this.value)" class="form-control"
                                            id="email" name="email" :value="old('email')" required
                                            placeholder="Enter Email">
                                        <span id="error_email" style="font-size: 13px;"></span>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="email" class="form-control-label">Problem Description</label>
                                    <textarea class="form-control" id="pro_description"
                                        name="pro_description"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <center>
                                        <div class="form-group">
                                            <button type="submit" class="btn  btn-success" id="submit"
                                                onclick="form_submit()">Submit</button>
                                            <button type="reset" class="btn  btn-primary">Clear</button>
                                        </div>
                                    </center>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('.table').dataTable({
            "language": {
                "emptyTable": "No data available in the table",
                "paginate": {
                    "previous": '<i class="fas fa-chevron-left text-dark"></i>',
                    "next": '<i class="fas fa-chevron-right text-dark"></i>'
                },
                "sEmptyTable": "No data available in the table"
            }
        });

    });

    $('#submit').click(function () {

        loader(true);
        $('#form1').submit();
    });

    function form_submit() {
        document.getElementById('.form_modal').submit();
    }

    $(".alert").delay(3500).slideUp(200, function () {
        $(this).alert('close');
    });

</script>
@endsection
