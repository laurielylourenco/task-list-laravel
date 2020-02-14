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
              echo "Erro com Banco de Dados :".$e->getMessage(); 
              exit(); 
            }
            catch(Exception $e)
            {
                echo "Erro Generico:".$e->getMessage();  
            }
         
        }

        public function cadastrarTarefa($title, $subjects,$data)
        {   
           
            $result = $this->conn->prepare("INSERT into tarefas(title, subjects,data) values (:t, :s,:d) ");
            $result->bindValue(":t", $title);
            $result->bindValue(":s", $subjects);
             $result->bindValue(":d", $data);
            $result->execute();
            return true;
      
        }

        public function buscarDados()
        {
            try 
            {
                $result = $this->conn->query("SELECT * From tarefas order by data DESC");
                $mostra = $result->fetchAll(PDO::FETCH_ASSOC);
                return $mostra;
                   
            }
            catch (Exception $e)
            {
                echo "Erro Generico:".$e->getMessage(); 
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

        public function atualizarTarefaNoBanco($id, $title, $subjects,$data)
        {    
            try 
            {
                $result = $this->conn->prepare("UPDATE tarefas SET 
                     title = :t, subjects = :s, data = :d  WHERE id = :id");


                $result->bindValue(":id", $id); 
                $result->bindValue(":t", $title);
                $result->bindValue(":s", $subjects);
                $result->bindValue(":d", $data);
                $result->execute();
                return true;

            } 
             catch (\Throwable $th)
            {
                echo "nao foi atualizado".$th->getMessage();
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
                echo "Nao foi excluido:".$th->getMessage();
            }
        }
      
     }