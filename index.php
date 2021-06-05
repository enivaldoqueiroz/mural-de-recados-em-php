<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mural de Recados</title>
</head>
<body>
    <h1>Mural de Recados</h1>
    <form actio="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        Nome:   <input type="text" name="usuario" require><br>
        Email:  <input type="text" name="email" require><br>
        Recado: <textarea name="recado" id="" cols="30" rows="10"></textarea><br>
                <input type="submit" value="Enviar">
    </form>

    <?php
        if(isset($_POST['usuario'])){
            $usuario = $_POST['usuario'];
            $email   = $_POST['email'];
            $recado  = $_POST['recado'];
            echo "$usuario - $email -  $recado";
        }
    ?>

</body>
</html>