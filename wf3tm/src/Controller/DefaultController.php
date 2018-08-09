<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Role;

class DefaultController extends Controller
{
    public function homepage()
    {
        $role = new Role();
        $role->setLabel('hello');
        
        echo $role;
        
        return $this->render('default/homepage.html.twig');
    }
}







