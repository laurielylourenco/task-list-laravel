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
   <?php require 'funcao/atualizar.php'; ?>
    <div class=""  id="listar">
    <form  method="POST">

    <?php
      $dados =  $p->buscarDados();
        if(count($dados) > 0) //se tem pessoas cadastradas no banco
        {
            for ($i=0; $i < count($dados); $i++)
            { 
                echo "<div class='card border-secondary text-justify col-sm-4'>"; 
            echo "<div class='card-body'>";
             foreach ($dados[$i] as $key => $value)
                {
                    if($key != "id")
                    {
                        if ($key == "title")
                        {
                            echo '<h4 class="card-title">'.$value.' </h4>';
                        }
                        else
                        {
                             echo "<p class='card-text'>".$value."</p>";
                        }    
                    }                
                }
    ?>
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
<?php
include_once 'layout/hf/footer.php';
?>