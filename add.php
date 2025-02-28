<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="add.php" method="post">
    <label for="nom"> Nom</label>
    <input type="text" id="nom" name="nom" required> <br>
    <label for="prix"> Prix</label>
    <input type="text" id="prix" name="prix" required><br>
    <label for="stock"> Stock</label>
    <input type="text" id="stock" name="stock" required> <br>
    <button type="submit">Ajouter</button>

</form>
</body>
</html>
