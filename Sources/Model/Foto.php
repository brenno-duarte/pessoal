<?php

class Foto {
    
    private $idImovel;
    private $idUsu;
    private $nomeFoto;
     
    /**
     * Get the value of idImovel
     */ 
    public function getIdImovel()
    {
        return $this->idImovel;
    }

    /**
     * Set the value of idImovel
     *
     * @return  self
     */ 
    public function setIdImovel($idImovel)
    {
        $this->idImovel = $idImovel;

        return $this;
    }
    
    /**
     * Get the value of idUsu
     */ 
    public function getIdUsu()
    {
        return $this->idUsu;
    }

    /**
     * Set the value of idUsu
     *
     * @return  self
     */ 
    public function setIdUsu($idUsu)
    {
        $this->idUsu = $idUsu;

        return $this;
    }

    /**
     * Get the value of nomeFoto
     */ 
    public function getNomeFoto()
    {
        return $this->nomeFoto;
    }

    /**
     * Set the value of nomeFoto
     *
     * @return  self
     */ 
    public function setNomeFoto($nomeFoto)
    {
        $this->nomeFoto = $nomeFoto;

        return $this;
    }
}