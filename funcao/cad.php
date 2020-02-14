<?php
    if(isset($_POST['title']))
    {

         $title = addslashes($_POST['title']);
         $subjects = addslashes($_POST['subjects']);
         $data = addslashes($_POST['data']);


        if(!empty($title) && !empty($subjects) && !empty($data) )
        {
            //print_r($title);
            //print_r($subjects);
            
            if(!$p->cadastrarTarefa($title, $subjects,$data))
            {       
                echo "<script>alert('tarefa incluida com sucesso!');
                window.location='index.php';</script>";
            }
                    
        }
    }
	?>