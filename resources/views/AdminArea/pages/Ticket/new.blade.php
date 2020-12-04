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
                            <li class="breadcrumb-item active" aria-current="page">New Ticket</li>
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
                    <form role="form" action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Customer Name</label>
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
                                    <label class="form-control-label" for="input-username">Customer Contact Number</label>
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
                                        <button type="reset" class="btn  btn-info">Clear</button>
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

@endsection

@section('js')


<script>
   

    function checkEmail() {

        var email = $('#email').val();
        if (IsEmail(email) == true) {
            // 
        } else if (IsEmail(email) == false) {
            $('#error_email').html("<strong>Invalid format.Please use a valid email</strong>").css('color', 'red');
            $('#email').addClass('has-error');
            $('#register-submit').prop('disabled', true);
        }
    }

    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            return false;
        } else {
            return true;
        }
    }
</script>
@endsection
