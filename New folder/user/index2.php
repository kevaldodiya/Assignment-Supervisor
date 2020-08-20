<?php include "../mysql/db.php";?>
<?php global $db_fname;
        global $db_uid;
global $db_tid;
    global $db_tname;
    global $db_tcat;
    global $db_desc;
    global $db_adate;
    global $db_ddate;
    global $db_status;
    global $db_reply;
?>
<?php session_start();?>
   <?php if(isset($_POST['login'])){
    global $connection;
    $uname = $_POST['Uname'];
    $pass = $_POST['pass'];
    $uname = mysqli_real_escape_string($connection,$uname);
    $pass = mysqli_real_escape_string($connection,$pass);
    $query = "SELECT * FROM user WHERE uname = '{$uname}'";
    $result = mysqli_query($connection,$query);
    if(!$result){
        die("Query 1 Failed");
    }
    while($row = mysqli_fetch_array($result)){
        
        $db_username = $row['uname'];
        $db_uid = $row['uid'];
        $db_pass = $row['pwd'];
        $db_acc = $row['acc'];
        $db_fname = $row['fname'];
    }
    
    if($db_username !== $uname && $db_pass !== $pass){
        header("Location: ../login/login.php");
    }
    
    if($db_username == $uname && $db_pass == $pass){
        if($db_acc=="Yes"){
            header("Location: ../admin/index.php");
        }
    }
}
?>
<?php
    $query2 = "SELECT * FROM task WHERE t_uid = '{$db_uid}'";
    $result2 = mysqli_query($connection,$query2);
    if(!$result2){
        die("Query 2 Failed");
    }
    
    while($row = mysqli_fetch_array($result2)){
        $db_tid = $row['tid'];
        $db_tname = $row['tname'];
        $db_tcat = $row['tcat'];
        $db_desc = $row['desc'];
        $db_adate = $row['adate'];
        $db_ddate = $row['ddate'];
        $db_status = $row['status'];
        $db_reply = $row['reply'];
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
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;}
        .table {
    border-collapse: collapse;
    width: 100%;
}

.th, .td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.tr:hover {background-color:#f5f5f5;}
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <h4><?php echo $db_fname;?></h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Home</a></li>
        <li><a href="#section2">Friends</a></li>
        <li><a href="#section3">Family</a></li>
        <li><a href="#section3">Photos</a></li>
      </ul><br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Blog..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>

    <div class="col-sm-10">
      <h3><strong>Hello <?php echo $db_fname;?></strong></h3>
      <hr>
      <h2>Your Tasks</h2>
      <br><br>
      


<h2>Hoverable Table</h2>
<p>Move the mouse over the table rows to see the effect.</p>

<table>
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Points</th>
  </tr>
  <tr>
    <td>Peter</td>
    <td>Griffin</td>
    <td>$100</td>
  </tr>
  <tr>
    <td>Lois</td>
    <td>Griffin</td>
    <td>$150</td>
  </tr>
  <tr>
    <td>Joe</td>
    <td>Swanson</td>
    <td>$300</td>
  </tr>
  <tr>
    <td>Cleveland</td>
    <td>Brown</td>
    <td>$250</td>
  </tr>
</table>


      <!--<table class="table table-hover">
    <thead>
      <tr>
        <th>Task ID</th>
        <th>Task Name</th>
        <th>Task Category</th>
        <th>Description</th>
        <th>Assigning Date</th>
        <th>Deadline</th>
        <th>Status</th>
        <th>Reply</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php //echo $db_tid;?></td>
        <td><?php //echo $db_tname;?></td>
        <td><?php //echo $db_tcat;?></td>
        <td><?php //echo $db_desc;?></td>
        <td><?php //echo $db_adate;?></td>
        <td><?php //echo $db_ddate;?></td>
        <td><?php //echo $db_status;?></td>
        <td><?php //echo $db_reply;?></td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>-->
   
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
