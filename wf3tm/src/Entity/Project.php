<?php
namespace App\Entity;

class Project
{
    private $title;
    private $worker;
    private $responsible;
    private $tasks;
    private $creationDate;

    public function __construct(
        string $title,
        array $workers,
        User $responsible,
        array $tasks
    ) {
        $this->title = $title;
        $this->worker = $workers;
        $this->responsible = $responsible;
        $this->tasks = $tasks;
        $this->creationDate = new \DateTime();
    }
    
    public function getTitle()
    {
        return $this->title;
    }

    public function getWorker()
    {
        return $this->worker;
    }

    public function getResponsible()
    {
        return $this->responsible;
    }

    public function getTasks()
    {
        return $this->tasks;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setWorker($worker)
    {
        $this->worker = $worker;
        return $this;
    }

    public function setResponsible($responsible)
    {
        $this->responsible = $responsible;
        return $this;
    }

    public function setTasks($tasks)
    {
        $this->tasks = $tasks;
        return $this;
    }

}

