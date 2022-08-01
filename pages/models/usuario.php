<?php
require_once ("../pages/conexao.php");

class usuario
{
    private $idUsuario;
    private $nomeUsuario;
    private $senhaUsuario;

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getNomeUsuario()
    {
        return $this->nomeUsuario;
    }

    public function getSenhaUsuario()
    {
        return $this->senhaUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function setNomeUsuario($nomeUsuario)
    {
        $this->nomeUsuario = $nomeUsuario;
    }

    public function setSenhaUsuario($senhaUsuario)
    {
        $this->senhaUsuario = $senhaUsuario;
    }

    public function listar(){
        $con = Conexao :: conectar();
        $query = "SELECT idUsuario,nomeUsuario,senhaUsuario FROM tbusuario";
        $resultado = $con->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

}
