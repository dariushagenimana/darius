<style>
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #74ebd5, #9face6);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Form container */
form {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    width: 300px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

/* Labels */
form br {
    display: none;
}

/* Inputs */
input {
    width: 100%;
    padding: 10px;
    margin: 10px 0 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

/* Input focus */
input:focus {
    border-color: #007bff;
    outline: none;
}

/* Button */
button {
    width: 100%;
    padding: 10px;
    background: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

/* Button hover */
button:hover {
    background: #0056b3;
}
</style>







<?php
$conn = mysqli_connect('localhost', 'root', '', 'shift3');

if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insert WITHOUT id (auto increment)
    $query = "INSERT INTO studentb (name, email, password) 
              VALUES ('$name', '$email', '$password')";

$conn->query($query);   

    // Redirect FIRST
    header("Location: vue.php");
    exit();
}
?>

<form action="#" method="post">
    Name:<br>
    <input type="text" name="name" required>
    <br>

    Email:<br>
    <input type="email" name="email" required>
    <br>

    Password:<br>
    <input type="password" name="password" required>
    <br><br>

    <button type="submit" name="submit">Submit</button>
</form>