<?php

class Usuario {
    private $nome;
    private $reputacao;
    private $email;
    private $senha;
    private $contato;
    
    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of reputacao
     */ 
    public function getReputacao()
    {
        return $this->reputacao;
    }

    /**
     * Set the value of reputacao
     *
     * @return  self
     */ 
    public function setReputacao($reputacao)
    {
        $this->reputacao = $reputacao;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of contato
     */ 
    public function getContato()
    {
        return $this->contato;
    }

    /**
     * Set the value of contato
     *
     * @return  self
     */ 
    public function setContato($contato)
    {
        $this->contato = $contato;

        return $this;
    }
}