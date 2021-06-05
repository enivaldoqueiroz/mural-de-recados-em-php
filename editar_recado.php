<?php
	include_once('conexao.php');
	
	$id = $_GET['id'];

	//Buscar os dados referente ao recado neste id
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
				<h1>Editar Recados</h1>
			</div>
			<div class="row">
				<div class="pull-right" style="padding-bottom: 20px; ">
					<a href="index.php"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
				</div>
			</div>
			<form class="form-horizontal" method="POST" action="processar_editar_recado.php" enctype="multipart/form-data">
			
				<div class="form-group">
					<label class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome Completo" value="<?php echo $row_recados['nome']; ?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">E-mail</label>
					<div class="col-sm-10">
						<input type="text" name="email" class="form-control" id="inputEmail3" placeholder="E-mail" value="<?php echo $row_recados['email']; ?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Recado</label>
					<div class="col-sm-10">						
						<textarea  name="recado" class="form-control" rows="3"><?php echo $row_recados['recado']; ?></textarea>						
					</div>
				</div>
						
				<input type="hidden" name="id" value="<?php echo $row_recados['id']; ?>">
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-warning">Alterar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>