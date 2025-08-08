<!DOCTYPE html>
<html>
<head>
    <title>Welcome to My PHP Project</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hello, ApexPlanet!</h1>
        <p>This is my first PHP file for the internship.</p>

        <?php
            echo "<p>Today is: " . date("Y-m-d") . "</p>";
            echo "<p>Server is working properly!</p>";
        ?>
    </div>
</body>
</html>
