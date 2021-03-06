<?php

declare(strict_types=1);

namespace AppTest\Repository;

use App\Contract\Entity;
use App\Seed\Category as CategorySeed;
use AppTest\AbstractDataAccessTest;
use App\Repository\Category as CategoryRepository;
use App\Entity\Category as CategoryEntity;

class CategoryTest extends AbstractDataAccessTest
{

    /**
     * @var \App\Repository\Category categoryRepository
     */
    private $categoryRepository;

    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->categoryRepository = new CategoryRepository();

    }

    public function assertPreConditions()
    {
        parent::assertPreConditions(); // TODO: Change the autogenerated stub
        $this->assertTrue(class_exists(CategoryEntity::class));
        $this->assertTrue(class_exists(CategoryRepository::class));
        $this->assertTrue(class_exists(CategorySeed::class));
    }

    public static function setUpBeforeClass()
    {

    }

    public static function tearDownAfterClass()
    {
        // Depois da classe executar todos os testes reset
    }

    public function testIfReturnIsCategoryEntityAndSave()
    {
        $this->assertInstanceOf(CategoryEntity::class, $this->saveData());
    }

    public function testIfReturnIsEntityAndSave()
    {
        $this->assertInstanceOf(Entity::class, $this->saveData());
    }

    public function testIfReturnIsEntityAndUpdate()
    {

        $category = new CategoryEntity();
        $category->setName(CategorySeed::$data[4]);
        $category->setId($this->saveData()->getId());
        $category = $this->categoryRepository->save($category);
        $this->assertInstanceOf(Entity::class, $category);
    }

    public function testGetById()
    {
        $category = $this->categoryRepository->getById($this->saveData()->getId());
        $this->assertInstanceOf(Entity::class, $category);
        $this->assertInstanceOf(CategoryEntity::class, $category);
    }

    public function testGetAllIfReturnIsArray()
    {
        $category = $this->categoryRepository->getAll();
        $this->assertInternalType('array', $category);
    }

    public function testGetOneByIfReturnIsCategoryEntity()
    {
        $this->saveData();
        $category = $this->categoryRepository->getOneBy();
        $this->assertInstanceOf(CategoryEntity::class, $category);
    }

    public function testIfReturnIsCategoryRepository()
    {

        $category = $this->categoryRepository->remove($this->saveData()->getId());
        $this->assertInstanceOf(CategoryRepository::class, $category);
    }

    private function saveData()
    {
        $category = new CategoryEntity();
        $category->setName(CategorySeed::$data[2]);
        return $this->categoryRepository->save($category);
    }

}