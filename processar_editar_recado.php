<?php
	include_once("conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$recado = mysqli_real_escape_string($conn, $_POST['recado']);
	
	$result_recados = "UPDATE recados SET nome='$nome', email='$email',recado='$recado' WHERE id = '$id'";
	
	$resultado_recados = mysqli_query($conn, $result_recados);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> 
		<!-- Fixed navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Mural de Recados</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            
                            <li class="nav-item">
                            <a class="nav-link" href="mural.php">Cadastrar Recados</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
		<!-- Fixed navbar -->
	
	
		<?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/administrativo.php'>
				<script type=\"text/javascript\">
					alert(\"Recado alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/administrativo.php'>
				<script type=\"text/javascript\">
					alert(\"Recado não foi alterado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>