<?php
  if (isset($_POST['signup-submit'])) 
    {
       require 'dbh.inc.php';
       $username = $_POST['uname'];
       $firstname = $_POST['uid'];
       $lastname = $_POST['id'];
       $email = $_POST['mail'];
       $password = $_POST['pwd'];
       $passwordRepeat = $_POST['pwd-repeat'];

       if (empty($username) || empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($passwordRepeat))
       {
           header("Location: ../signup.php?error=emptyfields");
           exit();
       } 
       else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username ))
       {
           header("Location: ../signup.php?error=invalidmailuname") ;
           exit();
       }
       else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
       {
          header("Location: ../signup.php?error=invalidmail");
          exit();
       }
       else if (!preg_match("/^[a-zA-Z0-9]*$/",$username ))
       {
         header("Location: ../signup.php?error=invaliduname");
         exit();
       }              
       else if(!preg_match("/^[a-zA-Z]*$/",$firstname ))
       {
           header("Location: ../signup.php?error=invaliduid");
           exit();
       }
       else if(!preg_match("/^[a-zA-Z]*$/",$lastname ))
       {
           header("Location../signup.php?error=invaliduid");
           exit();
       }
       else if (!preg_match("/^[1-9][0-9]*$/",$password ))
       {
           header("Location: ../signup.php?error=invalidpassword");
           exit();
       }
       else if ($password !== $passwordRepeat)
       {
           header("Location: ../signup.php?error=passwordcheck");
           exit();
       }
       else  
       {
           $sql = "SELECT arithmosmhtrwouUsers FROM users WHERE arithmosmhtrwouUsers=? ";
           $stmt =  mysqli_stmt_init($conn);
           if (!mysqli_stmt_prepare($stmt,$sql))
           {
             header("Location: ../signup.php?error=sqlerror");
             exit();
           }
        
         else
         {
           mysqli_stmt_bind_param($stmt, "i", $password);
           mysqli_stmt_execute($stmt);
           mysqli_stmt_store_result($stmt);
           $resultCheck = mysqli_stmt_num_rows($stmt);
           if ($resultCheck > 0)
            {
               header("Location: ../signup.php?error=usertaken");
               exit();
            }
          else
          {
               $sql = "INSERT INTO users (usernameidUsers, firstnameidUsers, lastnameidUsers, emailidUsers, arithmosmhtrwouUsers) VALUES (?, ?, ?, ?, ?)";
               $stmt =  mysqli_stmt_init($conn);
               if (!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
               else 
               {
                  
                  mysqli_stmt_bind_param($stmt, "ssssi",$username, $firstname, $lastname, $email, $password);
                  mysqli_stmt_execute($stmt);
                  header("Location: ../signup.php?signup=success");
                  exit();              
               }
           }
         }
      }
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    }

    else
    {
        header("Location: ../signup.php");
        exit();
    }
    

     
?>