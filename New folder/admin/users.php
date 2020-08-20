<?php include "../mysql/db.php";?>
<?php
global $connection;
if(isset($_POST['gr'])){
   
    $db_uid=$_COOKIE['uid12'];
   $db_acc=$_POST['access'];
    $query2 = "UPDATE `user` SET `acc` = '{$db_acc}' WHERE `user`.`uid`='{$db_uid}'";
    $res2 = mysqli_query($connection,$query2);
    if(!$res2){
        die("Query 2 Failed");
    }
    
}
else if(isset($_POST['rm'])){
   
    $db_uid=$_COOKIE['uid12'];
   
    $query2 = "DELETE FROM user WHERE `user`.`uid`='{$db_uid}' ";
    $res2 = mysqli_query($connection,$query2);
    if(!$res2){
        die("Query 2 Failed");
    }
    
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
      html{
          height:100%;
      }
     
      .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
      table {
    border-collapse: collapse;
    width: 100%;
 
    color: #000;
    
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 0.5px solid #ddd;
    
}

tr:hover {background-color:#f5f5f5;}
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      height: 34%;
      background-color: antiquewhite;
        opacity: 0.5;
    }
      
      #co{
          background-image: url(../Images/back16.png);
          background-position: center;
          background-size: cover;
        
    background-repeat: space;
   width: 100%;
    height: 100%;
   
      }
    
   
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body id="co">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li class="active"><a href="#">Users</a></li>
        <li><a href="categories.php">Categories</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-1 sidenav">
      <p><a href="grantp.php">Assign Privilege</a></p>
      <p><a href="rmuser.php">Remove User</a></p>
      <p></p>
    </div>
    <div class="col-sm-11 text-left"> 
      <h1>Welcome</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <hr></div><br>
     <div class="col-sm-12"> 
     <h3><strong><u>All Users</u></strong></h3>
<br>
            <table class="table table-hover">
    <thead>
      <tr>
        <th>User ID</th>
        <th>User Name</th>
        <th>Full Name</th>
        <th>Password</th>
        <th>Email</th>
        <th>Speciality 1</th>
        <th>Speciality 2</th>
        <th>Admnistrator</th>
       
      </tr>
    </thead>
     <?php
    $query2 = "SELECT * FROM user";
    $result2 = mysqli_query($connection,$query2);
    if(!$result2){
        die("Query 2 Failed");
    }
    
    while($row = mysqli_fetch_array($result2)){
        $db_uid = $row['uid'];
        $db_uname = $row['uname'];
        $db_fname = $row['fname'];
        $db_pwd = $row['pwd'];
        $db_email = $row['email'];
        $db_sp1 = $row['sp1'];
        $db_sp2 = $row['sp2'];
        $db_acc = $row['acc'];
echo"<tbody>
      <tr>
        <td>".$db_uid."</td>
        <td>".$db_uname."</td>
        <td>".$db_fname."</td>
        <td>".$db_pwd."</td>
        <td>".$db_email."</td>
        <td>".$db_sp1."</td>
        <td>".$db_sp2."</td>
        <td>".$db_acc."</td>
        
      </tr>
      
    </tbody>";}?>
  </table>
   
    </div>
    
  </div>
</div>



</body>
</html>
