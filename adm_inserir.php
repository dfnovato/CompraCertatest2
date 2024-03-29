<!DOCTYPE html>
<html lang="en">
<head>
  <title>CompraCerta</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="jquery.mask.js"></script>
  <link rel="apple-touch-icon" sizes="180x180" href="/CompraCertatest2/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../CompraCertatest2/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../CompraCertatest2/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="/CompraCertatest2/img/favicon/site.webmanifest">
  <link rel="mask-icon" href="/CompraCertatest2/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="css/styles.css">


    

</head>




<body style="min-width:372px;">
<?php
session_start();
// s n log volta index
if(empty($_SESSION['status']) || $_SESSION['status'] !=1){
    header('location:index.php');
}

include 'conexao.php';

$consulta = $cn->query("select * from tbl_categoria");

?>
<?php include 'nav.php' ?>

<main class="mb-5 pb-5 mb-md-0">
  
    <div class="container">
        <h1>Administrador</h1>
        <div class="row gx-3 mb-3">
            <div class="col-4">
                <div class="list-group">
                    <a href="adm_inserir.php" class="list-group-item list-group-item-action bg-danger text-light">
                        <i class="bi-person fs-6"></i>Incluir Produto
                    </a>
                    <a href="adm_auter.php" class="list-group-item list-group-item-action">
                        <i class="bi-truck fs-6"></i> Alterar/Excluir Produto
                    </a>
                    <a href="adm_venda.php" class="list-group-item list-group-item-action">
                        <i class="bi-heart fs-6"></i> Vendas
                    </a>
                    <a href="sair.php" class="list-group-item list-group-item-action">
                        <i class="bi-door-open fs-6"></i> Sair
                    </a>
                </div>
            </div>
        





        
   <div class="accordion col-12 col-md-8">
	
		<div class="card">
		
			<div class="card-header">
				
				<h2>Inclusão de Produtos</h2>
				
				<form method="post" action="insertproduto.php" name="incluiProd" enctype="multipart/form-data">
				
					<div class="form-group">
				
						<label for="txtisbn">Nome do Produto</label>
						<input name="txtisbn" type="text" class="form-control" required id="txtisbn">
					</div>
					
					<div class="form-group">					
					
					<label for="sltcat">Categoria</label>
					
					<select class="form-control" name="sltcat">
                    <option value="">Selecione</option>
                    <?php while($listaCat = $consulta->fetch(PDO::FETCH_ASSOC)) { ; ?>
					  
					  <option value="<?php echo $listaCat['cd_categoria'];?>"><?php echo $listaCat['ds_categoria'];?></option>			
                      <?php } ?>		
					</select>
			
					</div>				


					
					<div class="form-group">
				
					<label for="txtpreco">Preço</label>
					
					<input type="text" class="form-control"  name="txtpreco"  required id="txtpreco">

					</div>
					
					
					<div class="form-group">
				
					<label for="txtqtde">Quantidade em Estoque</label>
					
					<input type="number" class="form-control" name="txtqtde" required id="txtqtde">

					</div>
				
					
					
					<div class="form-group">
					
					<input type="file" accept="image/*" class="" name="txtfoto1" required id="txtfoto1">

					</div>

							
				<button type="submit" class="btn btn-danger">
					
					<span class="glyphicon glyphicon-pencil"> Cadastrar </span>
					
				</button>
				
				</form>
				
			</div>
		</div>
	</div>
           

</main>
<?php include 'footer.php' ?>
</body>
</html>