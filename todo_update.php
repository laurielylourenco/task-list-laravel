<?php  require_once "classe/tarefaClass.php";  
		$p = new Tarefa("crud_todo","localhost","root","lourenco");
?>
<?php
    include_once 'layout/hf/header.php';
?>
<body>

	<nav class="navbar navbar-dark bg-dark"> 
	 <div class="container d-flex justify-content-center">  
	 	<a class="navbar-brand" href="index.php">TO DO</a>
     </div>
	 </nav>  
	 <br>

	 <?php require 'funcao/atualizar.php'; require 'funcao/id_update.php';?>
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

			<div class="form-group">
				<input type="date" name="data" id="data" class="form-control"
				 value="<?php echo $result['data'];?>">
			</div>
			<input type="submit" name="enviar_assunto" 
			class="btn btn-dark btn-block" 
			value="Atualizar">
		</form>
	</div>
</body>
<?php
include_once 'layout/hf/footer.php';
?>