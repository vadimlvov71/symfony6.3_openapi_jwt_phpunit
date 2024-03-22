<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
         // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        if($error){
            //echo "ko";
        }else{
            //echo "nnoo";
        }
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
       
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }
    /*
    #[Route('/task/api/login_check', name: 'app_login_check_api')]
    public function apiLoginCheck(AuthenticationUtils $authenticationUtils): Response
    {
         
        $data = [];
        $data["response"] = "aaaa";
        return $data = json_encode($data);
    }
    */
}
