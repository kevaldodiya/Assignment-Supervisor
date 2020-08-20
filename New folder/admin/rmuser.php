<?php include "../mysql/db.php";?>
<?php
global $connection;
session_start();
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
      #fg{
          vertical-align: middle;
      }
    
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
    
   input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}
      #f2{
          margin-left:41%;
           margin-right:20%;
      }


.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 40%;
    border-radius: 5px;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
      .container {
    padding: 2px 16px;
}
#ff{
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
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
        <li><a href="users.php">Users</a></li>
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
     <h3><strong><u>Remove User</u></strong></h3>
     <div class="col-sm-5" id="f2"> 
     
    <div class="card">
<br>
   <label>User ID</label><br>
     <input list="uid" name="uid" placeholder="User ID"  id="userid" onkeyup="myfunction1()"  required>
     <script>
     function myfunction1() {
    var uid12=document.getElementById('userid').value;
        document.cookie="uid12 = "+uid12;
           location.reload(true);

}
      </script>
    <?php 
        
        
     $sp1 = "SELECT * FROM user";
    $rsp1 = mysqli_query($connection,$sp1);
    if(!$rsp1){
        die("Query 1 Failed");
    }
            
    echo "<datalist id='uid'>";
   
    while($row = mysqli_fetch_array($rsp1)){
     $uid = $row['uid'];
        
    echo "<option value=".$uid.">";
                             }echo "</datalist>";
         $sp2="SELECT * FROM user WHERE uid = '{$_COOKIE['uid12']}'";
         
       $rsp2 = mysqli_query($connection,$sp2);
         
         if(!$rsp2){
        die("Query 2 Failed");}
             global $uname;
         global $acc;
              while($row = mysqli_fetch_array($rsp2)){
     $uname = $row['uname'];
                  $acc = $row['acc'];
              
    }
         ?>

  <form action="users.php" method="post">
     <br>
      <label>Name &nbsp;&nbsp;</label><br> <input list="name"  disabled value="<?php echo $uname ;?>">
      <br>
    <br>  
      <label>Access &nbsp;&nbsp;</label> <br>    <input list="acc" name="access"  value="<?php echo $acc ;?>" disabled>
      <br>
      <datalist id="acc">
  <option value="Yes">
  <option value="No">
</datalist>
    
    <br>
   
    <input type="submit" value="Remove" name="rm">
  </form>
</div>

   </div>
    </div>
    
  </div>




</body>
</html>
