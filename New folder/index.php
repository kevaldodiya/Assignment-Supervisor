<!DOCTYPE html>
<html lang="en">
<head>
  <title>Assignment Supervisor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
      body{
          margin: 0;
          padding: 0;
          height: 100vh;
          
      }
      
      #particles-js{
          width: 100%;
          height: 100%;
          background-position: center;
          background-size: cover;
          background-image: url(Images/Back7.jpg);
      }
      /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      
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
      .row.content {height:auto;} 
    }
       .welcome{
           margin-left: 3%;
           margin-right: 3%;
           position: absolute;
           color: aliceblue;
           font-family: sans-serif;
       }
       .welcome #a1{
           background-color: #ffc107;
           color: #fff;
           letter-spacing: 2px;
           position: absolute;
           margin-top: 70px;
           font-family: sans-serif;
            margin-left: 30%;
        }
       .welcome #a2{
           background-color: #ffc107;
           color: #fff;
           letter-spacing: 2px;
           position: absolute;
           margin-top: 70px;
           font-family: sans-serif;
            margin-left: 65%;
        }
       
  </style>
</head>
<body>


        <div class="welcome">
<br><br>        <center><h1><font color = "burlywood" size = "7">Welcome to Assignment Supervisor</font></h1></center><br>
      <!--<hr>-->
      <strong>
          <br><h2><u>About Our Project</u></h2><br>
          <p align="justify">A simple and efficient assignment supervisor designed to aid an administrator to assign and check status of tasks assigned to their sub-ordinates.
           Any sub-ordinate user can check the tasks assigned to them and communicate with the administrator pertaining to the status of their tasks.
               The administrator has the privilege to assign tasks to specific users or to check which users specialize in a certain category of tasks. An administrator also has the privilege of assigning administrative rights to certain users.
           </p></strong>
            <a href="login/login.php" class="btn btn-warning btn-round btn-lg" id="a1"><strong>Login</strong></a>
            <a href="signup/signup.php" class="btn btn-warning btn-round btn-lg" id="a2"><strong>Sign Up</strong></a>
           </div>
            <div id="particles-js"></div>
  <script src="particles.js"></script>
<script src="app.js"></script>  
            
      
<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>
    
</body>
</html>