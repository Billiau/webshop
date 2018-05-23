<?php

class Product
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $cat_id;

    public function __construct($id, $name, $image, $description, $price, $cat_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->price = $price;
        $this->cat_id = $cat_id;
    }

    public function getID()
    {
        return $this->id;
    }

    public function setID($id): void
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }
    
    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function getCat_id()
    {
        return $this->cat_id;
    }

    public function setCat_id($cat_id): void
    {
        $this->cat_id = $cat_id;
    }

}