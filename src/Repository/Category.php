<?php

namespace App\Repository;

use App\Contract\Entity;
use App\Entity\Category as CategoryEntity;
use App\Contract\Repository;

class Category implements Repository
{

    private $entityManager;
    private $entityManagerRepository;

    public function __construct()
    {
        $this->entityManager = GetEntityManager();
        $this->entityManagerRepository = $this->entityManager->getRepository(CategoryEntity::class);

    }

    public function save(Entity $categoryEntity)
    {

        if($categoryEntity->getId() >= 1)
        {
            $entity = $this->entityManagerRepository->find($categoryEntity->getId());
            $entity->setName($categoryEntity->getName());
        }else{
            $this->entityManager->persist($categoryEntity);
        }
        $this->entityManager->flush();

        return $categoryEntity;
    }

    public function remove(int $id)
    {
        $this->entityManager->remove($this->getById($id));
        $this->entityManager->flush();
    }

    public function getById(int $id)
    {
        return $this->entityManagerRepository->find($id);
    }

    public function gendAll()
    {
        return $this->entityManagerRepository->findAll();
    }

}