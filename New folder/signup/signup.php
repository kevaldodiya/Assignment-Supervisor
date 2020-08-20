<?php include "../mysql/db.php";?>
<?php session_start();?>
<?php
global $connection;
?>
<?php
 if(isset($_POST['reg'])){
    global $connection;
    $uname = $_POST['Uname'];
    $fname = $_POST['Fname'];
    $pass = $_POST['pass'];
    $rpass = $_POST['rpass'];
    $mail = $_POST['mail'];
    $cat1 = $_POST['cat1'];
    $cat2 = $_POST['cat2'];
    $unique = "SELECT uname FROM user";
    $check_unique = mysqli_query($connection,$unique);
   if($pass != $rpass ){
       die("Password not the same");
   }
     if(!$check_unique){
        die("Connection Failed");
    }
    if($pass===$rpass){
            while($row = mysqli_fetch_array($check_unique)){
                if($row['uname']===$uname){
                    die("Username already taken");
                }
            }
        $ins = "INSERT INTO user(uname, fname, pwd, email, sp1, sp2) VALUES ('$uname','$fname','$pass','$mail','$cat1','$cat2')";
        $ins_query = mysqli_query($connection,$ins);
        $id_query = "SELECT uid FROM user WHERE uname = '{$uname}'";
        $id_res = mysqli_query($connection,$id_query);
        $row = mysqli_fetch_array($id_res);
        $_SESSION['db_uid'] = $row['uid'];
        header("Location:../login/login.php");
    }
    
    
}

?>
<!DOCTYPE html> 
<style>
    #il1{
        padding-bottom: 10px; 
        column-span:1; 
        column-count:1; 
    }
    #il2{
        
        column-span:1;
        column-count:1;
    }
    #c1{
       visibility: hidden; 
    }
    
</style>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Project Title </title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,300,700" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link href="https://www.gridbox.io/editor/assets/css/frame.css" rel="stylesheet" type="text/css"> 
    
    </head>

<body>
    <div class="wrapper">
        <div class="page-header" style="background-image: url('https://www.gridbox.io/projects/9a8a9f62-7a79-4026-8211-89aff887c193/assets/img/pexels-photo-584580.jpeg');">
            <div class="filter gb-filter"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mx-auto">
                        <div class="card card-register">
                            <h3 class="title gb-title tempdragsource">Sign Up</h3>
                            <form class="register-form" method="post" action="signup.php"> <label>Username</label> <input class="form-control" placeholder="Username" type="text" name="Uname" pattern="[A-za-z0-9]{1,15}" required> <label>Full Name</label> <input class="form-control" placeholder="Full Name"
                                    type="text" name="Fname" required><label>Password</label> <input class="form-control" placeholder="Password" type="password" name="pass" id="pp" onkeyup='check();' required>
                                    <label>Re-Enter Password</label> <input class="form-control" placeholder="Re-Enter Password" type="password" name="rpass" id="rp" title="Please re-enter the same password as above." onkeyup="check();" required>
                                    
                                    <h6 id="c1">Please Re-enter the same password.</h6>
                                    <label>Email</label> <input class="form-control" placeholder="Email" type="text" name="mail" required><br>
                                <div class="container col-s-4">
                                     <div id="il1"> <input list="category" name="cat1" placeholder="Speciality 1" required>
<?php  
     $sp1 = "SELECT cname FROM category";
    $rsp1 = mysqli_query($connection,$sp1);
    if(!$rsp1){
        die("Query 1 Failed");
    }
    echo "<datalist id='category'>";
    while($row = mysqli_fetch_array($rsp1)){
     $cat_name = $row['cname'];
        
    echo "<option value='".$cat_name."'>";
                             }echo "</datalist>"?> </div>
                             
                             <div id="il2"> <input list="category" name="cat2" placeholder="Speciality 2" required>
                             
                             <?php  
     $sp2 = "SELECT cname FROM category";
    $rsp2 = mysqli_query($connection,$sp2);
    if(!$rsp2){
        die("Query 2 Failed");
    }
    echo "<datalist id='category'>";
    while($row = mysqli_fetch_assoc($rsp2)){
     $cat_name = $row['cname'];
        
    echo "<option value='".$cat_name."'>";
                             }echo "</datalist>"?>
  </div>
                                </div> 
                                <button class="btn btn-danger btn-block btn-round" name="reg">Register</button>
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