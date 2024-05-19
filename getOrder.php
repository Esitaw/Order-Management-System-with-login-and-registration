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
    <title>Order Details</title>
    <style>
        body {
            background-color: #e8f4f8;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }

        h2 {
            font-size: 36px;
            font-family: monospace;
        }

        .order-details {
            font-size: 20px;
            margin: 20px auto;
            border: 1px solid #ccc;
            padding: 10px;
            max-width: 600px;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .error {
            color: red;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $order = $_GET["order"];
        $quantity = $_GET["quantity"];
        $cash = $_GET["cash"];

        $prices = [
            "pares" => 100,
            "chicken" => 120,
            "tapa" => 130
        ];
        $total_price = $prices[$order] * $quantity;

        $change = $cash - $total_price;

        echo "<h2>Order Details:</h2>";
        echo "<div class='order-details'>";
        echo "Order: " . ucfirst($order) . "<br>";
        echo "Quantity: " . $quantity . "<br>";
        echo "Total Price: " . $total_price . " PHP<br>";
        echo "Cash Paid: " . $cash . " PHP<br>";
        echo "Change: " . $change . " PHP";
        echo "</div>";
    } else {
        echo "<div class='error'>Error: Form not submitted.</div>";
    }
    ?>
</body>
</html>
