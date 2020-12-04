@extends('AdminArea/layouts.app-common')

@section('header')
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-black d-inline-block mb-0">User Create</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin-dashboard')}}">Dashboards</a></li>
                            <li class="breadcrumb-item active" aria-current="page">New User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="row justify-content-center responsive-moblile">
    <div class="col-md-6 responsive-moblile">
        <div class="card shadow responsive-moblile">
            <div class="card-body responsive-moblile">
                <form method="POST" action="{{ route('users-store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row responsive-moblile">
                        <div class="col-md-6 responsive-moblile">
                            <div class="form-group responsive-moblile">
                                <label>{{ __('First Name') }}<sup class="text-danger">*</sup></label>

                                <input type="hidden" name="user_role" value="1">


                                <input id="name" required type="text"
                                    class="responsive-moblile form-control @error('first_name') is-invalid @enderror"
                                    name="first_name" value="{{ old('first_name') }}" required>
                                @error('first_name')
                                <span class="invalid-feedback responsive-moblile" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="status" value="1">
                        <div class="col-md-6 responsive-moblile">

                            <div class="form-group responsive-moblile">
                                <label>{{ __('Last Name') }}<sup class="text-danger">*</sup></label>



                                <input id="slug" required type="text"
                                    class="responsive-moblile form-control @error('last_name') is-invalid @enderror"
                                    name="last_name" value="{{ old('last_name') }}" required>
                                @error('last_name')
                                <span class="invalid-feedback responsive-moblile" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="row responsive-moblile">

                        <div class="col-md-12 responsive-moblile">
                            <div class="form-group responsive-moblile">
                                <label>{{ __('E-Mail Address') }}<sup
                                        class="text-danger responsive-moblile">*</sup></label>
                                <input type="email" class="responsive-moblil form-control" name="email" id="inp_email"
                                    aria-describedby="helpId" placeholder="" required onkeyup="checkEmail(this.value)">
                                <span id="error_email" style="font-size: 13px;"></span>


                            </div>
                        </div>

                    </div>



                    <div class="row responsive-moblile">
                        <div class="col-lg-6 responsive-moblile">
                            <div class="form-group responsive-moblile">
                                <label>{{ __('Password') }}<sup class="text-danger">*</sup>|<a href="javascript:void(0)"
                                        id="passGen">Generate</a></label>
                                <input id="password" minlength="8" type="password"
                                    class="responsive-moblile form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password" onkeyup="validate();">

                                @error('password')
                                <span class="invalid-feedback responsive-moblile" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 responsive-moblile">
                            <div class="form-group responsive-moblile">
                                <label>{{ __('Confirm Password') }}<sup class="text-danger">*</sup></label>
                                <input id="password-confirm" minlength="8" type="password"
                                    class="responsive-moblile form-control" name="password_confirmation" required
                                    autocomplete="new-password" onkeyup="validate();">
                                <span style="font-size:12px;" id="message"></span>
                                @error('password-confirm')
                                <span class="invalid-feedback responsive-moblile" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                    </div>


                    <div class="row responsive-moblile">
                        <div class="col-md-12 responsive-moblile">
                            <h6 class="text-center responsive-moblile">
                                <button id="submit-btn" type="submit" class="btn btn-primary">
                                    Create User
                                </button>
                            </h6>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('css')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@endsection


@section('js')

<script>
    $(document).ready(function () {
        $('.select2').select2({
            theme: 'bootstrap',
            placeholder: "select option"
        });
    });

    $('#passGen').on('click', function () {
        var pass = Math.random().toString(36).slice(-8);
        $('#password').attr('type', 'text');
        $('#password-confirm').attr('type', 'text');
        $('#password').val(pass);
        $('#password-confirm').val(pass);
    })


    function validate() {
        if ($('#password').val() != '' && $('#inp_email').val() != '' && $('#password-confirm')
            .val() != '' && $('#name').val() != '') {
            if ($('#password-confirm').val() == $('#password').val()) {
                $('#message').html('Password Matching').css('color', 'green');
                $("#submit-btn").prop("disabled", false);
            } else {
                $('#message').html('Password Not Matching').css('color', 'red');

                $("#submit-btn").prop("disabled", true);
            }
        } else {

            $("#submit-btn").prop("disabled", true);
        }
    }

</script>

<script>
    function checkEmail() {

        var email = $('#inp_email').val();
        var error_email = '';
        if (IsEmail(email) == true) {
            $.ajax({
                url: "{{ route('email-available-check') }}",
                method: "GET",
                data: {
                    email: email
                },
                success: function (email_result) {
                    if (email_result == 'unique') {
                        $('#error_email').html('<label class="text-success">Email available</label>');
                        $('#inp_email').removeClass('has-error');
                    } else {
                        $('#error_email').html(
                            '<label class="text-danger">The email already exists. Please use a different email</label>'
                        );
                        $('#inp_email').addClass('has-error');
                    }
                }
            });
        } else {
            $('#error_email').html('<label class="text-danger">Invalid format.Please use a valid email</label>');
            $('#inp_email').addClass('has-error');
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
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>



@endsection
