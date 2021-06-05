<?php
    include_once('conexao.php');

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Mural de Recados</title>
</head>
<body>

            <?php
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    $request = md5(implode($_POST));
                    if(isset($_SESSION['ultima_request']) && $_SESSION['ultima_request'] == $request){
                        echo "Recado ja foi salvo";
                    } else {
                        $_SESSION['ultima_request']  = $request;
                        if(isset($_POST['usuario'])){
                            $usuario = $_POST['usuario'];
                            $email   = $_POST['email'];
                            $recado  = $_POST['recado'];
                            /*echo "$usuario - $email -  $recado";*/
                            $result_recado =    "INSERT INTO recados (nome, email, recado, created) 
                                                VALUES ('$usuario', '$email', '$recado', NOW())";
                            $resultado_recados = mysqli_query($conn, $result_recado);
                        }
                    }
                }               
               
            ?>

    <div class="container theme-showcase" role="main">
        <div class="page-header"> 
                      
            <h1>Mural de Recados</h1>
            <form actio="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome:</label>
                    <input type="text" name="usuario" class="form-control" placeholder="Nome Completo" Required>                
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" Required>                
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Recado:</label>
                    <textarea name="recado" class="form-control"  rows="3"></textarea>              
                </div>
                <input type="submit" class="btn btn-warning" value="Enviar">

                <!--                
                Nome:   <input type="text" name="usuario" require><br>
                Email:  <input type="text" name="email" require><br>
                Recado: <textarea name="recado" id="" cols="30" rows="10"></textarea><br>
                        <input type="submit" value="Enviar">
                -->
            </form>

            <h2>Lista de Recados</h2>
            <?php 
                $result_recado_bd = "SELECT * FROM recados";
                $resultado_recado_bd = mysqli_query($conn, $result_recado_bd);
                if(mysqli_num_rows($resultado_recado_bd) <= 0){
                    echo"NÃO EXISTE RECADO...";
                }else{
                    while ($rows = mysqli_fetch_assoc($resultado_recado_bd)) {
                    ?>
            
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $rows['nome']; ?></h4>
                            <?php echo $rows['recado']; ?>
                        </div>                    
                    </div>
                    <?php
                    }
                }                    
            ?>

            
        </div>
    </div>

</body>
</html>