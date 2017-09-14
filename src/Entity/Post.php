<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="Posts")
 *
 */

class Post
{

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     * */
    private $id;


    /**
     * @Name
     * @Column(type="string", length=50)
     * */
    private $title;

    /**
     * @Name
     * @Column(type="text")
     * */
    private $context;

    /**
     * @ManyToMany(targetEntity="App\Entity\Category")
     *
     */
    private $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param mixed $context
     * @return Post
     */
    public function setContext($context)
    {
        $this->context = $context;
        return $this;
    }

    public function addCategory(Category $category)
    {
        $this->categories->add($category);
        return $this;
    }


    /**
     * @return ArrayCollection
     */
    public function getCategory()
    {
        return $this->categories;
    }



}