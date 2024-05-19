<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
    <h2>Login</h2>
    <form method="post" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>

    <p>Don't have an account? <a href="register.php">Register here</a></p>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $conn = new mysqli("localhost", "root", "", "canteen");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['username'] = $username;
                header("Location: index.php");
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "No user found with that username.";
        }

        $conn->close();
    }
    ?>
</body>
</html>
