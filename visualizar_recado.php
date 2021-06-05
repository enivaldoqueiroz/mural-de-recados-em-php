<?php
	include_once("conexao.php");
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_recados = "SELECT * FROM recados WHERE id = '$id' LIMIT 1";
	$resultado_recados = mysqli_query($conn, $result_recados);
	$row_recados = mysqli_fetch_assoc($resultado_recados);	
?>
<html lang="pt-br">
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

		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Visualizar Usuário</h1>
			</div>
			<div class="row">
				<div class="pull-right" style="padding-bottom: 20px; ">
					<a href="index.php">
						<button type='button' class='btn btn-sm btn-success'>Listar</button>
					</a>
					
					<a href="editar_recado.php?id=<?php echo $row_recados['id']; ?>">
						<button type="button" class="btn btn-sm btn-warning">
							Editar
						</button>
					</a>
					
					<a href="apagar_recado.php?id=<?php echo $row_recados['id']; ?>">
						<button type="button" class="btn btn-sm btn-danger">
							Apagar
						</button>
					</a>
				</div>
			</div>
			<dl class="dl-horizontal">	
				<dt>Id: </dt>
				<dd><?php echo $row_recados['id']; ?></dd>
				<dt>Nome: </dt>
				<dd><?php echo $row_recados['nome']; ?></dd>
				<dt>E-mail: </dt>
				<dd><?php echo $row_recados['email']; ?></dd>
				<dt>Recado: </dt>
				<dd><?php echo $row_recados['recado']; ?></dd>
				<dt>Inserido: </dt>
				
			</dl>
		</div>
	</body>
</html>