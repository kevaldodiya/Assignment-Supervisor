<?php include "mysql/db.php";?>
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
        die("Unsuccessful");
    }
    
    while($row = mysqli_fetch_array($result)){
        $db_username = $row['uname'];
        $db_uid = $row['uid'];
        $db_pass = $row['pwd'];
        $db_acc = $row['acc'];
    }
    
    if($db_username !== $uname && $db_pass !== $pass){
        header("Location: login/login.php");
    }
    
    if($db_username == $uname && $db_pass == $pass){
        if($db_acc=="Yes"){
            header("Location: admin.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <!--<h2>Hello.$uname</h2>-->
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover">
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
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
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
  </table>
</div>

</body>