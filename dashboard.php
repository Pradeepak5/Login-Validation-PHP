<?php
include 'db.php';
if(!isset($_SESSION['id'])){
    header("location:index.php");
}
$id = $_SESSION['id'];
$sql = "Select * from users where id = '$id'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);

print_r('Welcome ');
echo $row['name'];
print_r((" !"))

?>
<br>
<br>
<h1>Personal Info </h1>
<form action="insert.php" method="post">
    DOB :
    <input type="date" name="dob" value="" required>
    <br>
    Age : 
    <input type="number" name="age" value="" required>
    <br>
    Mobile No : 
    <input type="number" name="mobile" value="" required>
    <button type="submit" name="button">Save</button>
</form>

<a href="logout.php">Logout</a>