<?php  require_once "classe/tarefaClass.php";  
		$p = new Tarefa("crud_todo","localhost","root","");//alterar para ultizar
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/cor.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<nav class="navbar navbar-dark bg-dark"> 
      
	 	<div class="container d-flex justify-content-center">  
	 		<a class="navbar-brand" href="index.php">TO DO</a>
     </div>
     
	 </nav>  
	 <br>
	 	<?php require 'funcao/atualizar.php';?>
    	<?php  require 'funcao/id_update.php';?>

    
	 <div class="card card-body border-dark col-5 " id="caixa">

		<form  method="POST" >
			<div class="form-group">
                <input type="text" name="title" id="title"  
                class="form-control" placeholder="De um titulo"
                value="<?php echo $result['title'];?>" autofocus>
			</div>

			<div class="form-group">
                <input type="text" name="subjects" id="subjects"
                 placeholder="Descreva o assunto" class="form-control"
                 value="<?php echo $result['subjects'];?>" >
			</div>
			<button type="submit" name="enviar_assunto" id="button" class="btn btn-dark btn-block" value="Add new" >Add new</button>
		</form>

	</div>
	</div>


</body>
   
</html>