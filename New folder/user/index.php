<?php include "../mysql/db.php";?>

<?php /*global $db_fname;
        global $db_uid;
global $db_tid;
    global $db_tname;
    global $db_tcat;
    global $db_desc;
    global $db_adate;
    global $db_ddate;
    global $db_status;
    global $db_reply;*/
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
        
        $_SESSION['db_uid'] = $row['uid'];
        $db_pass = $row['pwd'];
        $db_acc = $row['acc'];
        $_SESSION['db_fname'] = $row['fname'];
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
else if(isset($_POST['sub'])){
    $tid = $_POST['tid'];
    $reply = $_POST['reply'];
    echo $reply;
    echo $tid;
    $ans = "UPDATE task SET reply = '{$reply}'";
    $ans.= "WHERE tid = '{$tid}'";
    $ansres = mysqli_query($connection,$ans);
    if(!$ansres){
        die("Update Failed");
    }
  
    header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  
* {
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

    html{
        height: 100%;
    }
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
     color:#222;
   background-size: contain;
     
}
    #display{
     padding-top: 0px;
    padding-left: 200px;
    }

/* Style the top navigation bar */
.topnav {
    overflow: hidden;
    background-color: #333;
    column-span: 2;
    float:right;
}

/* Style the topnav links */
.topnav a {
    float: right;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 10px 18px;
    text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
    background-color: #ddd;
    color: black;
}

/* Style the content */
#a1 {
    background-image: url(../Images/Back1.jpg);
    background-repeat: space;
     background-size: cover;
   width: 100%;
    height: 100%;
    background-position:center; 
    padding: 10px;
}

    #il{
       padding-top:  25px;
       padding-left: 10px; 
    }
    #il1{
        height: 35px;
        background-color: #f1f1f1;
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
</style>
</head>
<body id="a1">


 <div class="topnav">
  <a href="../logout.php">Logout</a>
  <a href="#il1">Reply</a>
  <!--<a href="#">Link</a>-->
  
</div>

<div class="container-fluid">
 <br><br>
    <h1><strong><center>Hello <?php echo $_SESSION['db_fname']; ?></center></strong></h1><br>
    <h2><u><strong>Your Tasks</strong></u></h2><br>
  <strong> <table class="table table-hover">
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
    <?php
    $query2 = "SELECT * FROM task WHERE t_uid = '{$_SESSION['db_uid']}'";
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
echo"<tbody>
      <tr>
        <td>".$db_tid."</td>
        <td>".$db_tname."</td>
        <td>".$db_tcat."</td>
        <td>".$db_desc."</td>
        <td>".$db_adate."</td>
        <td>".$db_ddate."</td>
        <td>".$db_status."</td>
        <td>".$db_reply."</td>
        
      </tr>
      
    </tbody>";}?>
  </table></strong>
                                      <div id="il"><form method="post"> <input list="task" name="tid" placeholder="Select Task" id="il1">
<?php  
     $sp1 = "SELECT tid FROM task WHERE  t_uid = '{$_SESSION['db_uid']}'";
    $rsp1 = mysqli_query($connection,$sp1);
    if(!$rsp1){
        die("Query 1 Failed");
    }
    echo "<strong><datalist id='task'>";
    while($row = mysqli_fetch_array($rsp1)){
     $t_id = $row['tid'];
        
    echo "<strong><option value='".$t_id."'></strong>";
                             }echo "</datalist></strong>"?><div id="display">
          
              <textarea rows="6" cols="70" name="reply"></textarea>
              <input type="submit" name="sub" value="OK">
          
      </div></form> </div>



                                    
</div>
<!--<br> <br> <br><br><br><br><br><br><br>-->
<!--<div class="footer">
  <p>Footer</p>
</div>-->

</body>
</html>
