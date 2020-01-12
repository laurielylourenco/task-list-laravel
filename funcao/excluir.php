<?php
    if (isset($_GET['id'])) 
    {
       $id_tarefa = addslashes($_GET['id']);
       $p->excluirTarefa($id_tarefa);
       echo "<script>alert('tarefa excluida com sucesso!');
       window.location='tarefas.php';</script>";
    }
?>