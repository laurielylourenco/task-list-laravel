<?php //aki pegamos funcao para atualizar utilizado o id 
        if (isset($_GET['id_up'])) 
        // esse id vai verificar se pessoa clicou no botao atualizar
        {
            $id_update = addslashes($_GET['id_up']);
            $result= $p->buscarTarefaParaAtualizar($id_update); 
        }
?>