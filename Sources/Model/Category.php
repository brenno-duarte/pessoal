<?php

class Category {
    
    private $nameCategory;

    /**
     * Get the value of nameCategory
     */ 
    public function getNameCategory()
    {
        return $this->nameCategory;
    }

    /**
     * Set the value of nameCategory
     *
     * @return  self
     */ 
    public function setNameCategory($nameCategory)
    {
        $this->nameCategory = $nameCategory;

        return $this;
    }
}