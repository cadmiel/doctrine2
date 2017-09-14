<?php

namespace App\Repository;

use App\Entity\Category as CategoryEntity;

class Category
{

    private $categoryEntity;

    public function __construct(CategoryEntity $categoryEntity)
    {
        $this->categoryEntity = $categoryEntity;
    }

    public function save(){}
    public function remove(){}
    public function findById(){}
    public function gendAll(){}


}