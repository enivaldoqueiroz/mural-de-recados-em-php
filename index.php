<?php
    include_once('conexao.php');

?>

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
            $result_recado =    "INSERT INTO recados (nome, email, recado, created) 
                                VALUES ('$usuario', '$email', '$recado', NOW())";
            $resultado_recados = mysqli_query($conn, $result_recado);
        }
        echo "<h2>Lista de Recados</h2>";
        $result_recado_bd = "SELECT * FROM recados";
        $resultado_recado_bd = mysqli_query($conn, $result_recado_bd);
        if(mysqli_num_rows($resultado_recado_bd) <= 0){
            echo"NÃO EXISTE RECADO...";
        }else{
            while ($rows = mysqli_fetch_assoc($resultado_recado_bd)) {
                echo "<h4>".$rows['nome']."</h4>";
                echo $rows['recado'].'<br>';
            }
        }
    ?>

</body>
</html>