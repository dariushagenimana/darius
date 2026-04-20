<?php
include 'index.php';



$id = $_GET['id'] ?? 0;


$result = $conn->query("SELECT * FROM studentb WHERE id=$id");
$row = $result->fetch_assoc();


if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn->query("UPDATE studentb SET name='$name', EMAIL='$email', password='$password' WHERE id=$id");

    header("Location: vue.php");
    exit();
}
?>

<form method="post"> 
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    Name:<br>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
    <br>

    Email:<br>
    <input type="email" name="email" value="<?php echo $row['EMAIL']; ?>" required>
    <br>

    Password:<br>
    <input type="text" name="password" value="<?php echo $row['password']; ?>" required>
    <br><br>

    <button type="update" name="update">Update</button>
</form>