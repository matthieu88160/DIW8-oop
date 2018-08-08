<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\UserFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class AdminController extends Controller
{
    public function shuffleUsers(Request $request)
    {
        $users = $this->getDoctrine()
            ->getManager()
            ->getRepository(User::class)
            ->findAll();
        
        $users = array_filter($users, function(User $user){return $user->getName() !== 'matthieu';});
            
        shuffle($users);
            
        return $this->render(
            'Admin/shuffle.html.twig',
            [
                'users' => array_chunk ($users, $request->query->get('length', 2)),
                'length' => $request->query->get('length', 2)
            ]
        );
    }
    
    public function default(Request $request)
    {
        $user = new User();
        $form = $this->createForm(
            UserFormType::class,
            $user,
            ['standalone' => true]
        );
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // insert data in database
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($user);
            $manager->flush();
            
            // redirect to user list GET
            return $this->redirectToRoute('admin_default');
        }
        
        return $this->render(
            'Admin/default.html.twig',
            ['user_form' => $form->createView()]
        );
    }

    public function jsonUserList()
    {
        $userRepository = $this->getDoctrine()
            ->getManager()
            ->getRepository(User::class);
        
        $userList = $userRepository->findAll();
        
        $serializer = $this->getSerializer();
        
        return new JsonResponse(
            $serializer->serialize($userList, 'json'),
            200,
            [],
            true
        );
    }

    public function getSerializer() : SerializerInterface
    {
        return $this->get('serializer');
    }
}

