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
          margin-left:20%;
           margin-right:20%;
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
     <div class="col-sm-7" id="f2"> 
     <h3><strong><u>Assign Tasks</u></strong></h3>
<br>
   <div id="ff">
  <form action="index.php" method="post">
    <label>Task Name</label>
    <input type="text" id="tname" name="tname" placeholder="Enter Task Name" required><br>
    
    <label>Category</label>
     <input list="category" name="cat" placeholder="Category"  id="cat" onkeyup="myFunction()" required>
<script>
     function myFunction() {
    var cat12=document.getElementById('cat').value;
        document.cookie="cat12 = "+cat12;
}
      </script>
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
                             }echo "</datalist>"?>&nbsp;
                              <label>Users</label>
                             
   <input list="users" name="user" placeholder="Users" required>

<?php  
    $cat1234=$_COOKIE['cat12'];
    $sp1 = "SELECT uname FROM user WHERE sp1 = '{$cat1234}' OR sp2 = '{$cat1234}' ";
    $rsp1 = mysqli_query($connection,$sp1);
    if(!$rsp1){
        die("Query 1 Failed");
    }
    echo "<datalist id='users'>";
    while($row = mysqli_fetch_array($rsp1)){
     $uname = $row['uname'];
        
    echo "<option value='".$uname."'>";
                             }echo "</datalist>"
?><br>
<br><label>Assigning Date</label>&nbsp;&nbsp;
   <input type="date" name="adate" required>&nbsp;
 <label>Deadline</label>&nbsp;
   <input type="date" name="ddate" required>
 
<br><br>
<label>Description</label><br>

 <textarea name="desc" rows="6" cols="50" placeholder="Description about the task." required></textarea> <br>
    <input type="submit" value="Submit" name="assign">
  </form>
</div>

   
    </div>
    
  </div>
</div>



</body>
</html>
