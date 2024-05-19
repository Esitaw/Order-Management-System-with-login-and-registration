<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body {
            background-color: #e8f4f8;
            background-image: url(https://cdn.dribbble.com/users/5277272/screenshots/11913720/group_24.png);
            background-position: center;
            background-size: cover;
            height: 140vh;
            display: flex;
            flex-direction: column;
        }

        h2 {
            font-size: 41px;
            text-align: center;
        }

        form {
            font-size: 26px;
            text-align: center;
        }

        p {
            font-size: 20px;
            text-align: center;
        }


    </style>
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="register.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Register">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $conn = new mysqli("localhost", "root", "", "canteen");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful. <a href='login.php'>Login here</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</body>
</html>
