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
        $responsible = new User(34, 'Eric montecalvo');
        $title = 'My awesome project';
        
        $tasks = $this->provider->provideTasks();
        $workers = [];
        foreach ($tasks as $task) {
            if (!isset($workers['developper'])) {
                $workers['developper'] = [];
            }
            
            if (!in_array($task->getAuthor(), $workers['developper'])) {
                $workers['developper'][] = $task->getAuthor();
            }
        }
        
        return [
            new Project($title, $workers, $responsible, $tasks)
        ];
        
    }
}

