<script src="{{asset('AdminArea/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('AdminArea/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('AdminArea/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('AdminArea/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('AdminArea/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
<!-- Optional JS -->
<script src="{{asset('AdminArea/vendor/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('AdminArea/vendor/chart.js/dist/Chart.extension.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('AdminArea/js/argon.js?v=1.2.0')}}"></script>


<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>



<!-- date range -->

<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<!-- chartJS  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.21/sorting/datetime-moment.js"></script>
<!-- select 2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js">

<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>

<script src="{{ asset('img/dist/image-uploader.min.js') }}"></script>




@yield('js')

<script>
    $('#passGen').on('click', function () {
        var pass = Math.random().toString(36).slice(-8);
        $('#new_pass').attr('type', 'text');
        $('#confirm_pass').attr('type', 'text');
        $('#new_pass').val(pass);
        $('#confirm_pass').val(pass);
        validatepasswordconf();
    })
    function validatepasswordconf() {
        if ($('#new_pass').val() == $('#confirm_pass').val() && $('#new_pass').val() != '' && $('#confirm_pass')
        .val() != '') {
            $('#conf_pass_msg').addClass('text-success').removeClass('text-danger').html(
                '<i class="fa fa-check"></i>');
            $('#sumbit-btn').removeAttr('disabled');

        } else if ($('#new_pass').val() == '' && $('#confirm_pass').val() == '' || ($('#confirm_pass').val() == '' && $(
                '#new_pass').val() == '')) {
            $('#conf_pass_msg').addClass('text-danger').removeClass('text-success').html(
                '');
            $('#sumbit-btn').attr('disabled', true);
        } else {
            $('#conf_pass_msg').addClass('text-danger').removeClass('text-success').html(
                'The password and confirmation' +
                ' password do not match');
            $('#sumbit-btn').attr('disabled', true);
        }
    }
</script>
