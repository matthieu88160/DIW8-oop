<?php

namespace App\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Form\TaskFormType;

class TaskController extends Controller
{
    private $twig;
    
    public function __construct(
        \Twig_Environment $twig
    ) {
        $this->twig = $twig;
    }
    
    public function listTasks(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $task = new Task();
        $form = $this->createForm(TaskFormType::class, $task, ['standalone' => true]);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($task);
            $manager->flush();
            
            return $this->redirectToRoute('task_list');
        }
        
        
        return new Response(
            $this->twig->render(
                'task/list.html.twig',
                [
                    'tasks' =>  $manager->getRepository(Task::class)->findAll(),
                    'form' => $form->createView()
                ]
            )
        );
    }
    
    public function taskDetail(Request $request)
    {
        $id = $request->query->get('id');
        
        if (!$id) {
            throw new NotFoundHttpException();
        }
        
        $tasks = [];
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
