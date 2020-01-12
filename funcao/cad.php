<?php
    if(isset($_POST['title']))
    {
         $title = addslashes($_POST['title']);
         $subjects = addslashes($_POST['subjects']);

        if(!empty($title) && !empty($subjects) )
        {
            //print_r($title);
            //print_r($subjects);
            if(!$p->cadastrarTarefa($title, $subjects))
            {       
                echo "<script>alert('tarefa incluida com sucesso!');
                window.location='index.php';</script>";
            }
                    
        }
    }
	?>