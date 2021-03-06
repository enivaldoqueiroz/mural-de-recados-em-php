<?php
	session_start();
	include_once('conexao.php');
	
	$result_recado_bd = "SELECT * FROM recados";
	$resultado_recado_bd = mysqli_query($conn, $result_recado_bd);
?>
<!DOCTYPE html>
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
				<h1>Lista de Recados</h1>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nome</th>
								<th>E-mail</th>
								<th>Inserido</th>
								<th>A????es</th>
							</tr>
						</thead>
						<tbody>
							<?php while($rows = mysqli_fetch_assoc($resultado_recado_bd)){ ?>
								<tr>
									<td><?php echo $rows['id']; ?></td>
									<td><?php echo $rows['nome']; ?></td>
									<td><?php echo $rows['email']; ?></td>
									<td><?php echo $rows['created']; ?></td>
									<td>
										<a href="visualizar_recado.php?id=<?php echo $rows['id']; ?>">
											<button type="button" class="btn btn-xs btn-primary">Visualizar</button>
										</a>
										<a href="editar_recado.php?id=<?php echo $rows['id']; ?>">
											<button type="button" class="btn btn-xs btn-warning">Editar</button>
										</a>
										<a href="apagar_recado.php?id=<?php echo $rows['id']; ?>">
											<button type="button" class="btn btn-xs btn-danger">Apagar</button>
										</a>
									</td>
								</tr>  
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
		<br>
		
	</body>
</html>
