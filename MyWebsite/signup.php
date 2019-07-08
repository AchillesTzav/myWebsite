<?php
  require "header.php";
?>

    <main>
      <div class="column side"> 
      <h2>Signup</h2>
      <?php
        if(isset($_GET['error'])) {        
          if($_GET['error'] == "emptyfields") { 
            echo '<p>Fill in all fields!</p> ';
          }
          else if ($_GET['error'] == "invalidmailuname") { 
            echo '<p>Invalid username and e-mail!</p> ';
          }
          else if ($_GET['error'] == "invalidmail") {
            echo '<p>Invalid e-mail!</p> '; 
          }
          else if ($_GET['error'] == "invaliduname") { 
            echo '<p>Invalid username!</p> ';
          }
          else if ($_GET['error'] == "invaliduid") { 
            echo '<p>Invalid First name or Last name!</p> ';
          }
          else if ($_GET['error'] == "passwordcheck") { 
            echo '<p>Your passwords do not match!</p> ';
          }
          else if ($_GET['error'] == "usertaken") { 
            echo '<p>A.M. is already taken!</p> ';
          }
        }
        else if ($_GET['signup'] == "success") {
          echo '<p>Signup successful!</p>';
        } 
          
        
      ?>
      
       
      
      
        <form  action="includes/signup.inc.php" method="post">
          
           <label for="uname"><b>Username</b></label> 
           <br>
           <input type="text" name="uname" placeholder="Enter Username" required>
           <br>
           <label for="uid"><b>First name</b></label>
           <br>
           <input type="text" name="uid" placeholder="Enter First name" required>
           <br>
           <label for="id"><b>Last name</b></label>
           <br>
           <input type="text" name="id" placeholder="Enter Last name" required>
           <br>
           <label for="mail"><b>E-mail</b></label>
           <br>
           <input type="text" name="mail" placeholder="Enter E-mail" required>
           <br>
           <label for="pwd"><b>Arithmos Mhtrwou</b></label>
           <br>
           <input type="password" name="pwd" placeholder="Enter Arithmos Mhtrwou" required>
           <br>
           <label for="pwd-repeat"><b>Repeat Arithmos Mhtrwou</b></label>
           <br>
           <input type="password" name="pwd-repeat" placeholder="Repeat Arithmos Mhtrwou"required>
           <br>
           <button type="submit" name="signup-submit">Signup</button>
           
          
        </form> 
      </div> 
       
      
    
    </main>

<?php
  require "footer.php";
?>  