<?php  require_once "classe/tarefaClass.php"; 
$p = new Tarefa("crud_todo","localhost","root","");//alterar para ultizar
?>
<!DOCTYPE html>
<html>
<head>
	<title>List</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/cor.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-dark bg-dark"> 
        <div class="container d-flex justify-content-center">  
            <a class="navbar-brand" href="index.php">TO DO</a>
        </div>
    </nav> 


   <br>
   <?php require 'funcao/atualizar.php'; ?>
    <div  id ="listar" >
    <form  method="POST">

    <?php
      $dados =  $p->buscarDados();
        if(count($dados) > 0) //se tem pessoas cadastradas no banco
        {
            for ($i=0; $i < count($dados); $i++)
            { 
                echo "<div class='card border border-secondary text-justify col-md-4 col-sm-4 col-lg-3 ' >";
                echo "<div class='card-body'>";
                     foreach ($dados[$i] as $key => $value)
                        {
                            if($key != "id")
                            {
                                echo "<p>".$value."</p>";
                            }
                          
                        }
    ?>
                <h4 class="card-title"></h4>
                
                <a href="todo_update.php?id_up=<?php echo $dados[$i]["id"];?>" class="btn btn-primary card-link">Atualizar</a>

                <a href="tarefas.php?id=<?php echo $dados[$i]["id"];?>" class=" btn btn-danger card-link">Excluir</a>
                </div>

             <?php
                echo " </div>";
                echo "<br>";
            }           
        }
        else
        {
            ?>
            <div class="aviso"><h4> nao tem pessoas cadastradas no banco</h4></div>
           
        <?php
        }
        ?>
       
       
    </form>
    </div>
</body>

<?php
    include 'funcao/id_update.php';
    include 'funcao/excluir.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</html>