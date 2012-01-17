<?php

/**
 * @Entity(repositoryClass="PostRepository")
 * @Table(name="posts")
 */
class Post
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @Column(type="string")
     */
    protected $title;
    
    /**
     * @Column(type="text")
     */
    protected $body;
    
    /**
     * @ManyToOne(targetEntity="User", fetch="EAGER")
     */
    protected $poster;
    
    /**
     * @ManyToMany(targetEntity="Category", inversedBy="posts", fetch="EAGER")
     */
    protected $categories;
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }
    
    public function getPoster()
    {
        return $this->poster;
    }

    public function setPoster($poster)
    {
        $this->poster = $poster;
    }
    
    public function getCategories()
    {
        return $this->categories;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }
}