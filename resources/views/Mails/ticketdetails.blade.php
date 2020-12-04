<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Register Email</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.16.0/css/mdb.min.css" rel="stylesheet">

</head>

<body>

    <div class="card">

        <h5 class="card-header info-color white-text text-center py-4">
            <strong>Registration with DCMS</strong>
        </h5>
        <!--Card content-->
        <div class="">

            <!-- Form -->
            <div>

                Dear {{$data->name}}!<br>


                <p> Your ticket has been successfully created.<br>
                    Your account information as below</p>

                <div>
                    E-mail :  {{$data->email}}
                </div>


                <div>
                    Referance id : {{$data->ref_no }}
                </div>

             

                <p>Thank & Regards.</p>
            </div>

        </div>

    </div>



</body>

</html>