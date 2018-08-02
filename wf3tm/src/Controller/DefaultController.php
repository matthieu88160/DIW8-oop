<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function homepage()
    {
        $loggedState = true;
        $elementList = range(1, 10);
        
        return $this->render(
            'example.html.twig',
            [
                'isLogged' => $loggedState,
                'elements' => []
            ]
        );
    }
}







