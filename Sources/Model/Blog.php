<?php

class Blog {
    private $idcategory;
    private $titulo;
    private $resumo;
    private $autor;
    private $imagem;
    private $nome_imagem;
    private $conteudo;
    private $data;

     /**
     * Get the value of idcategory
     */ 
    public function getIdcategory()
    {
        return $this->idcategory;
    }

    /**
     * Set the value of idcategory
     *
     * @return  self
     */ 
    public function setIdcategory($idcategory)
    {
        $this->idcategory = $idcategory;

        return $this;
    }
    
    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of resumo
     */ 
    public function getResumo()
    {
        return $this->resumo;
    }

    /**
     * Set the value of resumo
     *
     * @return  self
     */ 
    public function setResumo($resumo)
    {
        $this->resumo = $resumo;

        return $this;
    }

    /**
     * Get the value of autor
     */ 
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set the value of autor
     *
     * @return  self
     */ 
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get the value of imagem
     */ 
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * Set the value of imagem
     *
     * @return  self
     */ 
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;

        return $this;
    }

    /**
     * Get the value of conteudo
     */ 
    public function getConteudo()
    {
        return $this->conteudo;
    }

    /**
     * Set the value of conteudo
     *
     * @return  self
     */ 
    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;

        return $this;
    }

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of nome_imagem
     */ 
    public function getNome_imagem()
    {
        return $this->nome_imagem;
    }

    /**
     * Set the value of nome_imagem
     *
     * @return  self
     */ 
    public function setNome_imagem($nome_imagem)
    {
        $this->nome_imagem = $nome_imagem;

        return $this;
    }
}