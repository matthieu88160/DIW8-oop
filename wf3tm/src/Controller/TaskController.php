<?php

namespace App\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use App\Provider\TaskProvider;
use Symfony\Component\HttpFoundation\Response;

class TaskController
{
    private $provider;
    
    private $twig;
    
    public function __construct(
        TaskProvider $provider,
        \Twig_Environment $twig
    ) {
        $this->provider = $provider;
        $this->twig = $twig;
    }
    
    public function listTasks()
    {
        return new Response(
            $this->twig->render(
                'task/list.html.twig',
                ['tasks' => $this->provider->provideTasks()]
            )
        );
    }
    
    public function taskDetail(Request $request)
    {
        $id = $request->query->get('id');
        
        if (!$id) {
            throw new NotFoundHttpException();
        }
        
        $tasks = $this->provider->provideTasks();
        if (!isset($tasks[$id])) {
            throw new NotFoundHttpException();
        }
        
        return new Response(
            $this->twig->render(
                'task/detail.html.twig',
                ['task'=>$tasks[$id]]
            )
        );
    }
}
