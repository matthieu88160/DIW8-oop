<?php
namespace App\Entity;

class Task
{
    private $id;
    
    private $title;
    
    private $description;
    
    private $author;
    
    private $creationDate;
    
    private $priority;
    
    public function __construct(
        $id,
        string $title,
        string $description,
        $author,
        int $priority
    ) {
        $this->creationDate = new \DateTime();
        
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->author = $author;
        $this->priority = $priority;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    public function setPriority($priority)
    {
        $this->priority = $priority;
        return $this;
    }
}

