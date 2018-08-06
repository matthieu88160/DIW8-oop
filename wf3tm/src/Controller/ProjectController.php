<?php
namespace App\Controller;

use App\Provider\ProjectProvider;
use Symfony\Component\HttpFoundation\Response;

class ProjectController
{
    private $provider;
    
    private $twig;

    public function __construct(
        ProjectProvider $provider,
        \Twig_Environment $twig
    ) {
        $this->provider = $provider;
        $this->twig = $twig;
    }
    
    public function listProjects()
    {
        return new Response(
            $this->twig->render(
                'Project/list.html.twig',
                ['projects' => $this->provider->provideProjects()]
            )
        );
    }
}

