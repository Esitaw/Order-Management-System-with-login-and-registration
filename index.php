<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management System</title>
    <style>
        body {
            background-color: #e8f4f8;
        }
        
        h2 {
            font-size: 36px;
            text-align: center;
            font-family: monospace;
        }

        h3 {
            font-size: 22px;
            text-align: center;
        }

        ul {
            list-style: none;
            padding: 0;
            text-align: center;
        }

        li {
            margin-bottom: 10px; 
        }

        .menu-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 10px;
        }

        .images {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .images img {
            max-width: 230px;
            height: auto;
            margin-top: 20px;
        }

        form {
            text-align: center;
            margin-bottom: 10px;
            margin-top: 40px;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

    </style>
</head>
<body>
    <h2>Welcome to Sam's Canteen! Here are the prices.</h2>
    <h3>All foods in the menu are unli rice, unli soup, and with free soft drinks!</h3>
    <ul>
        <li class="menu-item">Pares Overload = 100 PHP</li>
        <li class="menu-item">Fried Chicken = 120 PHP</li>
        <li class="menu-item">Beef Tapa = 130 PHP</li>
    </ul>
    <div class="images">
        <img src="https://upload.wikimedia.org/wikipedia/en/9/9c/Beef_Pares.jpg" alt="Pares Overload">
        <img src="https://i.ytimg.com/vi/yXSQnkaisGc/maxresdefault.jpg" alt="Fried Chicken">
        <img src="https://images.squarespace-cdn.com/content/v1/5c6f5806e5f7d11951ac4e84/1552264898311-MJE482JH41CKS4R22FPY/Tapa.jpg" alt="Beef Tapa">
    </div>
    <form method="GET" action="getOrder.php">
        <label for="order">Select an order:</label>
        <select id="order" name="order">
            <option value="pares">Pares Overload</option>
            <option value="chicken">Fried Chicken</option>
            <option value="tapa">Beef Tapa</option>
        </select><br><br>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" required><br><br>
        <label for="cash">Cash Paid:</label>
        <input type="number" id="cash" name="cash" min="0" required><br><br>
        <input type="submit" value="Submit Order">
    </form>
</body>
</html>
