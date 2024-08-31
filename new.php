<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greet User</title>
    <link rel="stylesheet" href="new.css">
    <script>
        function showMessage() {
            document.getElementById('foodMessage').style.display = 'block';
        }
    </script>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $favorite_food = htmlspecialchars($_POST['favorite_food']);

        $currentHour = date("H");

        
        if (11 <= $currentHour && $currentHour <= 16) {
            $greeting = "Afternoon";
        } elseif ($currentHour >= 02 && $currentHour <= 11) {
            $greeting = "Morning";
        } elseif ($currentHour >= 16 && $currentHour <= 21) {
            $greeting = "Evening";
        } else {
            $greeting = "Night";
        }

        echo "<h1>Good $greeting, $name!</h1>";
        echo "<p>Your favorite food is $favorite_food.</p>";
        echo "<script>showMessage();</script>";
    } else {
    ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="showMessage()">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <br><br>

            <label>Favorite Food:</label><br>
            <input type="radio" id="pizza" name="favorite_food" value="Pizza" required>
            <label for="pizza">Pizza</label><br>
            <input type="radio" id="sushi" name="favorite_food" value="Paneer">
            <label for="sushi">Paneer</label><br>
            <input type="radio" id="burger" name="favorite_food" value="Burger">
            <label for="burger">Burger</label><br><br>

            <input type="submit" value="Submit">
        </form>
    <?php
    }
    ?>

    
    <div id="foodMessage" class="food-message">
        Your food is ready!
    </div>
</body>
</html>
