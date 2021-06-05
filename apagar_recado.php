<?php
	include_once("conexao.php");
	$id = $_GET['id'];
	
	$result_recados = "DELETE FROM recados WHERE id = '$id'";
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/mural-de-recados-em-php/index.php'>
				<script type=\"text/javascript\">
					alert(\"Recado apagado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/mural-de-recados-em-php/index.php?link=18'>
				<script type=\"text/javascript\">
					alert(\"Recado não foi apagado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>