<?php

require_once('./connection.php');

// Check if the form has been submitted
if (isset($_POST['action']) && $_POST['action'] == 'create-author') {
    $firstName = $_POST['first_name'] ?? '';
    $lastName = $_POST['last_name'] ?? '';

    if ($firstName && $lastName) {
        try {
            $stmt = $pdo->prepare('INSERT INTO authors (first_name, last_name) VALUES (:first_name, :last_name)');
            $stmt->execute([
                'first_name' => $firstName,
                'last_name' => $lastName
            ]);
            // Redirect back to the list of books or a success page
            header("Location: ./index.php");
            die();
        } catch (PDOException $e) {
            // Handle potential errors, e.g., duplicate entry
            echo "Viga autori lisamisel: " . $e->getMessage();
            exit();
        }
    } else {
        $error = "Ees- ja perekonnanimi on kohustuslikud!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lisa uus autor</title>
</head>
<body>
    <h1>Lisa uus autor andmebaasi</h1>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="create-author.php" method="post">
        <div>
            <label for="first_name">Eesnimi:</label>
            <input type="text" id="first_name" name="first_name" required>
        </div>
        <br>
        <div>
            <label for="last_name">Perekonnanimi:</label>
            <input type="text" id="last_name" name="last_name" required>
        </div>
        <br>
        <button type="submit" name="action" value="create-author">Salvesta autor</button>
    </form>

    <br>
    <a href="index.php">
        <button>Tagasi avalehele</button>
    </a>

</body>
</html>