<?php
include('connection.php');

// process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $capsule_title = $_POST['capsule_title'];
    $capsule_open_date = $_POST['capsule_open_date'];
    $capsule_message = $_POST['capsule_message'];

    // insert to capsules table
    $stmt = $conn->prepare("INSERT INTO capsules (owner_id, capsule_title, capsule_open_date, capsule_message) VALUES (?, ?, ?, ?)");

    // (to do) 
    if ($stmt) { 
        $owner_id = 1;
        $stmt->bind_param("isss", $owner_id, $capsule_title, $capsule_open_date, $capsule_message);

        if ($stmt->execute()) {
            echo "New capsule created successfully";
        } else {
            echo "Error executing statement: " . $stmt->error; 
        }
        $stmt->close(); 
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Capsule</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input[type="text"],
        input[type="datetime-local"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Create a New Capsule</h2>
        <form action="" method="POST"> 
            <label for="capsule_title">Capsule Title:</label>
            <input type="text" id="capsule_title" name="capsule_title" required>

            <label for="capsule_open_date">Capsule Open Date:</label>
            <input type="datetime-local" id="capsule_open_date" name="capsule_open_date" required>

            <label for="capsule_message">Capsule Message:</label>
            <textarea id="capsule_message" name="capsule_message" rows="4" required></textarea>

            <button type="submit">Create Capsule</button>
        </form>
    </div>

</body>
</html>
