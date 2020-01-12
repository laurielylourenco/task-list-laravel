<?php
     class Tarefa{

        private $conn;
        public function __construct($dbname,$host, $user, $password)
        {
            try 
            {
                $this->conn= new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$password); 
            } 
            catch (PDOException $e) 
            {
              echo "<b>Erro com Banco de Dados :</b>".$e->getMessage(); 
              exit(); 
            }
            catch(Exception $e)
            {
                echo "<b>Erro Generico:</b>".$e->getMessage();  
            }
         
        }

        public function cadastrarTarefa($title, $subjects)
        {   
            $result = $this->conn->prepare("INSERT into tarefas(title, subjects) values (:t, :s) ");
            $result->bindValue(":t", $title);
            $result->bindValue(":s", $subjects);
            $result->execute();
            return true;
            
            
        }

        public function buscarDados()
        {
            try 
            {
                $result = $this->conn->query("SELECT * From tarefas order by id DESC");
                $mostra = $result->fetchAll(PDO::FETCH_ASSOC);
                return $mostra;
                   
            }
            catch (\Throwable $th)
            {
                echo "<b>Tarefa nao encontrada</b>".$th->getMessage();
            }
        }

        public function buscarTarefaParaAtualizar($id)
            {
                $recebeDados = array();
                $result = $this->conn->prepare("SELECT * from tarefas where id = :id");
                $result->bindValue(":id", $id);
                $result->execute();

                $recebeDados = $result->fetch(PDO::FETCH_ASSOC);
                return $recebeDados;
                
            }

        public function atualizarTarefaNoBanco($id, $title, $subjects)
        {    
            try 
            {
                $result = $this->conn->prepare("UPDATE tarefas SET 
                     title = :t, subjects = :s  WHERE id = :id");


                $result->bindValue(":id", $id); 
                $result->bindValue(":t", $title);
                $result->bindValue(":s", $subjects);
                $result->execute();
                return true;

            } 
             catch (\Throwable $th)
            {
                echo "<b>Nao foi atualizado</b>".$th->getMessage();
            }
               
              
        }

        public function excluirTarefa($id)
        {
            try
            {
                $result = $this->conn->prepare("DELETE from tarefas where id = :id");
                $result->bindValue(":id", $id);
                $result->execute();
                return true;

            } 
            catch (\Throwable $th)
            {
                echo "<b>Nao foi excluido</b>:".$th->getMessage();
            }
        }
      
     }