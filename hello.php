<?php // kirjutatakse nende koodide vahele

// var_dump($_POST);

if ( isset($_POST['action-submit']) && isset($_POST["username"]) ) {
    
    $user = $_POST["username"];

}

$names = [ 'Tiit', 'Taavi', 'Bob', 'Rainer', 'Tõnu' ];

foreach ( $names as $key => $name) {    // loopimismeetodid
    echo ($key + 1) . ". {$name}<br>";
}

for ( $i = 0; $i < sizeof($names); $i++ ) {
    echo ($i + 1) . ". {$names[$i]}<br>";
}

$i = 0;
while ( $i < count($names) ) {

    $i++;
    echo ($i + 1) . ". {$names[$i]}<br>";
}

$i = 0;
do {
    echo ($i + 1) . ". {$names[$i]}<br>";
    $i++;
} while ( $i < count($names) );

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sissejuhatus PHPsse</title>
</head>
<body>
    
    <form action="./hello.php" method="POST">

        <label for="user">Nimi:</label>
        <input type="text" name="username" id="user">
        <input type="submit" name="action-submit" value="Saada">

    </form>
    
    <?php if ( isset($user) ) { ?>

        Hello, <?= $user; ?>!
    
    <?php } ?>
    

</body>
</html>