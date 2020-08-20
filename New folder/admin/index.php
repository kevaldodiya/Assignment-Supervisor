<?php include "../mysql/db.php";?>
<?php
global $connection;
session_start();
?>
<?php
if(isset($_POST['assign'])){
    $query1 = "SELECT uid FROM user WHERE uname = '{$_POST['user']}'";
    $res1 = mysqli_query($connection,$query1);
    if(!$res1){
        die("Query 1 Failed");
    }
    $db_uid="";
    while($row = mysqli_fetch_array($res1)){
        $db_uid = $row['uid'];
    }
    $db_tname = $_POST['tname'];
    $db_cat = $_POST['cat'];
    $db_desc = $_POST['desc'];
    $db_adate = $_POST['adate'];
    $db_ddate = $_POST['ddate'];
    $query2 = "INSERT INTO task (`t_uid`, `tname`, `tcat`, `desc`, `adate`, `ddate`) VALUES ({$db_uid}, '{$db_tname}', '{$db_cat}', '{$db_desc}', '{$db_adate}', '{$db_ddate}')";
    $res2 = mysqli_query($connection,$query2);
    if(!$res2){
        die("Query 2 Failed");
    }
}
else if(isset($_POST['update'])){
    $db_desc = $_POST['desc'];
   
    $db_ddate = $_POST['ddate'];
    $db_tid=$_COOKIE['tid12'];
   
    $query2 = "UPDATE `task` SET `desc` = '{$db_desc}', `ddate` = '{$db_ddate}' WHERE `task`.`tid`='{$db_tid}' ";
    $res2 = mysqli_query($connection,$query2);
    if(!$res2){
        die("Query 2 Failed");
    }
    
}
else if(isset($_POST['delete'])){
   
    $db_tid=$_COOKIE['tid12'];
   
    $query2 = "DELETE FROM task WHERE `task`.`tid`='{$db_tid}' ";
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
    background-color: antiquewhite;
    color: #000;
    opacity:0.55;
}

th {
    padding: 10px;
    text-align: left;
    border-bottom: 0.5px solid #222;
      background-color: black;
    color:antiquewhite;
}
 td {
    padding: 10px;
    text-align: left;
    border-bottom: 0.5px solid #222;
    
}
      
tr:hover {background-color:forestgreen; }
    
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
        <li class="active"><a href="#">Home</a></li>
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
    <div class="col-sm-1 sidenav">
      <p><a href="assign.php">Assign Task</a></p>
      <p><a href="update.php">Update Task</a></p>
      <p><a href="delete.php">Delete Task</a></p>
    </div>
    <div class="col-sm-11 text-left"> 
      <h1>Welcome</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <hr></div><br>
     <div class="col-sm-12"> 
     <h3><strong><u>All Tasks</u></strong></h3>
<br>
            <table class="table table-hover" id="t1">
    <thead>
      <tr>
        <th>Task ID</th>
        <th>Task Name</th>
        <th>User Name</th>
        <th>Task Category</th>
        <th>Description</th>
        <th>Assigning Date</th>
        <th>Deadline</th>
        <th>Status</th>
        <th>Reply</th>
       
      </tr>
    </thead>
     <?php
    $query2 = "SELECT t.*, uname FROM task as t, user as u WHERE t.t_uid=u.uid";
    $result2 = mysqli_query($connection,$query2);
    if(!$result2){
        die("Query 2 Failed");
    }
    
    while($row = mysqli_fetch_array($result2)){
        $db_tid = $row['tid'];
        $db_tname = $row['tname'];
        $db_uname = $row['uname'];
        $db_tcat = $row['tcat'];
        $db_desc = $row['desc'];
        $db_adate = $row['adate'];
        $db_ddate = $row['ddate'];
        $db_status = $row['status'];
        $db_reply = $row['reply'];
echo"<tbody>
      <tr>
        <td>".$db_tid."</td>
        <td>".$db_tname."</td>
        <td>".$db_uname."</td>
        <td>".$db_tcat."</td>
        <td>".$db_desc."</td>
        <td>".$db_adate."</td>
        <td>".$db_ddate."</td>
        <td>".$db_status."</td>
        <td>".$db_reply."</td>
        
      </tr>
      
    </tbody>";}?>
  </table>
   
    </div>
    
  </div>
</div>



</body>
</html>
