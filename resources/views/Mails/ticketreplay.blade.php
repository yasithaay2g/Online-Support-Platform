<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Ticket Details</title>

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
            <strong>Ticket Details</strong>
        </h5>
        <!--Card content-->
        <div class="">

            <!-- Form -->
            <div>

                Dear {{$tickets->name}}!<br>


                <p> Reply for ticket.<br>
                   </p>

                <div>
                    E-mail :{{$tickets->email}}
                </div>


                <div>
                    Referance id : {{$tickets->ref_no }}
                </div>

                <div>
                   Message: {{$replys->message}}
                </div>

                <p>Thank & Regards.</p>
            </div>

        </div>

    </div>



</body>

</html>