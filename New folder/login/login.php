
<!DOCTYPE html> 
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,300,700" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link href="https://www.gridbox.io/editor/assets/css/frame.css" rel="stylesheet" type="text/css"> </head>

<body>
    <div class="wrapper">
        <div class="page-header" style="background-image: url('Back6.jpg');">
            <div class="filter gb-filter"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mx-auto">
                        <div class="card card-register">
                            <h3 class="title gb-title tempdragsource"><font color="#222"><strong>Login</strong></font></h3>
                            <form class="register-form" method = "post" action="../user/index.php"> <label>Username</label> <input class="form-control" placeholder="Username" type="text" name="Uname"> <label>Password</label> <input class="form-control" placeholder="Password" type="password" name="pass">
                                <button class="btn btn-danger btn-block btn-round" name="login">Login</button>
                                <a href="../index.php" class="btn btn-danger btn-block btn-round"><font color="#222">Back</font></a>
                                 </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer register-footer text-center">
                <h6>Made with <i class="fa fa-heart heart"></i> by SSIPMT</h6>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/index.js"></script>
</body>

</html>