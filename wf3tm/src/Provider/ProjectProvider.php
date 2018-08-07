<?php
namespace App\Provider;

use App\Entity\User;
use App\Entity\Project;

class ProjectProvider
{
    private $provider;

    public function __construct(TaskProvider $provider)
    {
        $this->provider = $provider;
    }
    
    public function provideProjects()
    {
        $responsible = new User('Eric montecalvo');
        $title = 'My awesome project';
        
        $tasks = $this->provider->provideTasks();
        $workers = [];
        
        $project = new Project();
        $project->setResponsible($responsible)
            ->setTitle($title);
        
        foreach ($tasks as $task) {
            $project->addTask($task);
            if (!in_array($task->getAuthor(), $workers)) {
                $project->addWorker($task->getAuthor());
                $workers[] = $task->getAuthor();
            }
        }
        return [$project];
        
    }
}

