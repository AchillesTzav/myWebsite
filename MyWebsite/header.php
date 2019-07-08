<?php
 session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Lab Registration</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="style2.css">
      
        
    </head>
    <body>
    <div class="header">
        <h1>Welcome to the online lab - registration platform</h1>
        <p>Login in order to be able to choose the day and time of your desired lesson</p>
    </div>  
    
    <div class="topnav">
        <a href="#">Home</a>
    </div>    
    
    <div class="row">
        <div class="column side">
           <!-- <h2>Login</h2> -->
            <?php
                     if (isset($_SESSION['userId'])) { 
                        echo '<form action="includes/logout.inc.php" method="post">
                        <div class="column side">
                        <button type="submit" name="logout-submit">Logout </button>
                        </div>
                       </form> ';
                      }
                      else { 
                        echo '<form action="includes/login.inc.php" method="post">
                        <div class="row">
                        <div class="column side">
                        <h2>Login</h2>
                        </div>
                        </div>
                        <div class="imgcontainer">
                         <img src="img\webdesign.png" class="avatar">
                        </div> 
                        <div class="container">
                        <label for="uname"><b>Username</b></label>
                        <br>
                        <input type="text" name="uname" placeholder="Enter Username" required >
                        <br>
                        <label for="pwd"><b>Password</b></label>
                        <br>
                        <input type="password" name="pwd" placeholder="Enter Arithmos Mhtrwou" required>
                        <br>
                        <button type="submit" name="login-submit">Login </button>
                        <br>
                       </form>
                       <br>
                       <h1><a href="signup.php">Signup</a></h1>' ;
                       
                       
                      }
                ?>
        </div>
    </div>
    
    <div class="column middle">
      <a href="#">
        <img src="img\logo1.png" alt="logo" width="500" height="650"  >
      </a>
    </div> 
            
                
              
              
              
                
                
                
                
                
                
                 
               
            
         
        
    </body>    