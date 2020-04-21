<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myDB";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $firstname, $lastname, $email);

    // set parameters and execute
    $firstname = "John2";
    $lastname = "Doe2";
    $email = "john2@example.com";
    $stmt->execute();

    $firstname = "Mary2";
    $lastname = "Moe2";
    $email = "mary2@example.com";
    $stmt->execute();

    $firstname = "Julie2";
    $lastname = "Dooley2";
    $email = "julie2@example.com";
    $stmt->execute();

    echo "New records created successfully";

    $stmt->close();
    $conn->close();
?>