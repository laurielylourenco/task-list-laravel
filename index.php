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
	<?php
    	require_once "funcao/cad.php";
	?>
	
  		<p>  </p>
	
	 <div class="card card-body border-dark col-5 " id="caixa">

		<form  method="POST" >
			<div class="form-group">
				<input type="text" name="title" id="title"  class="form-control" placeholder="De um titulo" autofocus>
			</div>

			<div class="form-group">
				<input type="text" name="subjects" id="subjects" placeholder="Descreva o assunto" class="form-control">
			</div>

			<div class="form-group">
				<input type="date" name="data" id="data" class="form-control">
			</div>
			
			<button type="submit" name="enviar_assunto" id="button" 
					class="btn btn-dark btn-block" value="Add new" onclick="appendText()" >Add new
			</button>
		
		</form>

	</div>

	<div id="botao">
		<a type="submit" href="tarefas.php" class=" btn btn btn-outline-dark btn-block">
		Task list</a>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
		$("button").click(function(){
		$("p").append("<p class='alert alert-success justify-content-center ' role='alert'>Tarefa Incluida</p>");
		});   });
	</script>
</body>
<?php
include_once 'layout/hf/footer.php';
?>
