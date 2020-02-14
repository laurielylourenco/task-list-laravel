 <?php
	 if(isset($_POST['title']) )

	{
	 	if (isset($_GET['id_up']) &&  !empty(($_GET['id_up'])) )
	 	{
	 		$id_update = addslashes($_GET['id_up']);

	 		$title = addslashes($_POST['title']);

	 		$subjects = addslashes($_POST['subjects']);

	 		$data = addslashes($_POST['data']);

	 		if (!empty($title) && !empty($subjects) && !empty($data)) 
	 		{
	 			$p->atualizarTarefaNoBanco($id_update, $title, $subjects, $data);

	 			echo "<script>alert('tarefa alterada com sucesso!');
       				window.location='tarefas.php';</script>";

	 			
	 		}
	 	}
	}
?>