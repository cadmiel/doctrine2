<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../src/doctrine.php';

use App\Entity\Category;
use App\Entity\Post;

$entityManager = GetEntityManager();
$categoryRepository = $entityManager->getRepository(Category::class);
$postRepository = $entityManager->getRepository(Post::class);

/*

$category = new Category();
$category->setName('Lucas');
$entityManager->persist($category);
$entityManager->flush();

*/

/*
$category = $categoryRepository->find(3);
$category->setName('L cas');
$entityManager->flush();
*/

/*

$category = $categoryRepository->find(3);
$entityManager->remove($category);
$entityManager->flush();

*/

/**
 * @var Post $post
 */
$post = $postRepository->find(1);
$post->getCategory()->clear();
$entityManager->flush();

$categorias = [1,2];
foreach($categorias as $cat)
{
    $post->addCategory($categoryRepository->find($cat));
}
$entityManager->flush();

print_r($categoryRepository->findAll());


