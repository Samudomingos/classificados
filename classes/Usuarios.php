<?php

Class Usuarios {
   private $conn;

   public function __construct($conn)
   {
        $this->conn = $conn;
   }

   public function getTotalUsuarios()
   {

        $sql = $this->conn->query("SELECT COUNT(*) as c FROM usuarios");
        $row = $sql->fetch();
        return $row['c'];

   }
    public function cadastrar($nome, $email, $senha, $tel)
    {
        $sql = $this->conn->prepare("SELECT id FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount()==0) {
            $sql = $this->conn->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :tel");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", $senha);
            $sql->bindValue(":tel", $tel);
            $sql->execute();
            return true;
        }else {
            return false;
        }
    }
    public function login($email, $senha)
    {
        $sql = $this->conn->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->Execute();

        if ($sql->rowCount()>0) {
            
            $dados = $sql->fetch();
            $_SESSION['cLogin'] = $dados['id'];
            return true;
        } else {
            return false;
        }
    }
}



?>