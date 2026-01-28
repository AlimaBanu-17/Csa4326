v<?php
// Database connection
$host = "localhost";       // usually localhost
$user = "root";            // your MySQL username
$password = "";            // your MySQL password
$dbname = "student_db";    // database name

$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// Insert data if form is submitted
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students (name, age, email) VALUES ('$name', $age, '$email')";
    if($conn->query($sql) === TRUE){
        echo "Record inserted successfully!<br>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Retrieve and display data
$result = $conn->query("SELECT * FROM students");

if($result->num_rows > 0){
    echo "<h3>Student Records:</h3>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Email</th></tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['age']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>

<hr>

<h3>Insert Student Record</h3>
<form method="post" action="">
    Name: <input type="text" name="name" required><br><br>
    Age: <input type="number" name="age" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    <input type="submit" name="submit" value="Insert">
</form>
