@extends('AdminArea/layouts.app-common')

@section('header')
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-black d-inline-block mb-0">Ticket Management</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboards</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ticket Student</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-xl-6 col-md-8 order-xl-1 center">

            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}

            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-control-label" for="input-username">Name</label>
                            <p>{{ $tickets->name}}</p>
                        </div>
                        <div class="col-lg-6">

                            <label class="form-control-label" for="input-username">Email</label>
                            <p>{{ $tickets->email}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-control-label" for="input-username">Description</label>
                            <p>{{$tickets->pro_description}}</p>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-control-label" for="input-username">Contact Number</label>
                            <p>{{$tickets->phone }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">

                            <label class="form-control-label" for="input-username">Status</label>
                            @if($tickets->status==1)
                            <span class="badge badge-pill badge-success">Open</span>
                            @elseif($tickets->status==0)
                            <span class="badge badge-pill badge-primary">Pending</span>
                            @endif
                        </div>

                    </div>



                </div>
            </div>

            <div class="card">
                <div class="card-body">
                <form role="form" action="{{ route('tickets.reply.store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">

                            <div class="col-lg-12">

                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Reply</label>
                         
                                    <input type="text" id="name" name="message"
                                        class="form-control @error('message') is-invalid @enderror" placeholder="Reply Message" value="" required>
                                    @error('message')
                                    <div class="alert alert-danger">{{ $message }}</div>
                             
                                    @enderror

                                <input type="hidden" id="custId" name="ticket_id" value="{{$tickets->id}}">
                                </div>
                            </div>
                           
                        </div>
                       
                        <div class="row">

                            <div class="col-lg-12">
                                <center>
                                    <div class="form-group">

                                        <button type="submit" class="btn  btn-success btn-sm" id="submit"
                                            onclick="form_submit()">Submit</button>
                                        <button type="reset" class="btn  btn-info btn-sm">Clear</button>
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
