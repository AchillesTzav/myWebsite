<?php
  require "header.php";
?>

    
    
<?php
  if (isset($_SESSION['userId'])) { 
    echo '<p class="login-status">You are logged in!</p>';
  }
      
  else { 
     echo '<p class="login-status">You are logged out!</p>';
  }
?>

<?php
// define variables and set to empty values
$dateid = $courseid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $courseid = test_input($_POST["courses"]);
  $dateid = test_input($_POST["coding"]);
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
if (isset($_SESSION['userId'])) {



  echo '
<form  action="index.php" method="post">
Crourses :
<br>
<input list="courses" name="courses">
  <datalist id="courses">
    <option value="Web Developing Applications">
    <option value="Databases">
    <option value="SAE">
    <option value="Deep Learning">
    <option value="Quantum Physics">
  </datalist>
<br>


<div class="column side">
Dates :
<br>   
<input type="radio" name="coding" id="" value="Monday 11:00-13:00">Monday 11:00-13:00
<br>
<input type="radio" name="coding" id="" value="Monday 13:00-15:00">Monday 13:00-15:00
<br>
<input type="radio" name="coding" id="" value="Monday 15:00-17:00">Monday 15:00-17:00
<br>
<input type="radio" name="coding" id="" value="Wednesday 11:00-13:00">Wednesday 11:00-13:00
<br>
<input type="radio" name="coding" id="" value="Wednesday 13:00-15:00">Wednesday 13:00-15:00
<br>
<input type="radio" name="coding" id="" value="Wednesday 15:00-17:00">Wednesday 15:00-17:00
<br>
<input type="radio" name="coding" id="" value="Friday 11:00-13:00">Friday 11:00-13:00
<br>
<input type="radio" name="coding" id="" value="Friday 13:00-15:00">Friday 13:00-15:00
<br>
<input type="radio" name="coding" id="" value="Friday 15:00-17:00">Friday 15:00-17:00
<br><br>
<input type="submit" name="lab-submit" value="Submit">

</form> ';

echo "<h2>Your preference is:</h2>";
echo $courseid;
echo " ";
echo $dateid;



if (isset($_POST['lab-submit'])) {
  $servername = "localhost";
  $dBUsername = "root";
  $dBPassword = "";
  $dBName = "loginsystem";

  $conn =mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

  if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
  }
  $stmt = $conn->prepare("INSERT INTO usercourse (courseid, dateid, idUsers) VALUES (?, ?, ?)");
  $stmt->bind_param("ssi", $courseid, $dateid, $idUsers);

  $courseid = $_POST["courses"];
  $dateid = $_POST["coding"];
  $idUsers = $_SESSION['userId'];  
  
 
  $stmt->execute();
  
  echo '<br>' ;
  
  $stmt->close();
  $conn->close();
  echo 'New records created successfully!';
}

}
?>




    

<?php
  require "footer.php";
?>