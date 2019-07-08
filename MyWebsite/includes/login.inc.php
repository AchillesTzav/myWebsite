<?php 
if (isset($_POST['login-submit'])) {
    require 'dbh.inc.php';
    
    $uname = $_POST['uname'];    
    $logpassword = $_POST['pwd'];

    if (empty($uname) || empty($logpassword) ) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE usernameidUsers=? AND arithmosmhtrwouUsers =? ; ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else { 
            mysqli_stmt_bind_param($stmt, "si", $uname,$logpassword );
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                
                if ($logpassword == false) {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                    
                }
                else if($logpassword == true) { 
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['usernameid'] = $row['usernameidUsers'];                                                            

                    header("Location: ../index.php?login=success");
                    exit();
                }
                else { 
                    header("Location: ../index.php?error=wwrongpwd");
                    exit();
                }

            }
            else { 
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }

}
else {
    header("Location: ../index.php");
    exit();
}