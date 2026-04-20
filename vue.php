<style>
body {
    font-family: Arial, sans-serif;
    background: #f4f6f9;
    margin: 0;
    padding: 20px;
     background: linear-gradient(135deg, #74ebd5, #9face6);
}

.T {
    width: 90%;
    margin: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    padding: 20px;
}

th {
    background: #007bff;
    color: white;
    padding: 12px;
    text-align: left;
}

td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

tr:hover {
    background: #f1f1f1;
}

/* Buttons */
a {
    text-decoration: none;
    padding: 6px 12px;
    border-radius: 5px;
    font-size: 14px;
}

/* Update button */
a[href*="edit"] {
    background: #007bff;
    color: white;
}

/* Delete button */
a[href*="delete"] {
    background: #dc3545;
    color: white;
}

/* Hover effects */
a:hover {
    opacity: 0.8;
}

/* Title spacing */
br {
    display: none;
}
</style>


<?php
$conn = new mysqli("localhost", "root", "", "shift3");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM studentb WHERE id=$id");
    
}



$query = "SELECT * FROM studentb";
$result = $conn->query($query);
?><br><br><br>
<div class="T">
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Action</th>
    </tr>

<?php
while ($row = $result->fetch_assoc()) {
    ?>
     <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['EMAIL']; ?></td>
        <td><?php echo $row['password']; ?></td>    
<td>
            <a href="edit.php?id=<?php echo $row['id']; ?>">Update</a>
            <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>    

    </tr>

<?php
}
?>

</table>
</DIV>

<?php $conn->close(); ?>