<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class AdminController
{
    private $twig;
    
    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }
    
    public function default()
    {
        return new Response(
            $this->twig->render('Admin/default.html.twig')
        );
    }
}

