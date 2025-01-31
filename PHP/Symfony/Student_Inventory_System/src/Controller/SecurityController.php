<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        if ($this->isGranted('ROLE_STUDENT')) {
            return $this->redirectToRoute('user_index');
        } elseif ($this->isGranted('ROLE_TEACHER')) {
            return $this->redirectToRoute('teacher_index');
        }
        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin_index');
        }
        if ($this->isGranted('ROLE_SUPER_ADMIN')) {
            return $this->redirectToRoute('super_admin_index');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
    /**
     * @Route("/redirectaccuser", name="user_redirect", methods={"GET"})
     */
    public function redirectAccUser(): Response
    {
        if ($this->isGranted('ROLE_STUDENT'))
            return $this->redirectToRoute('user_index');
        if ($this->isGranted('ROLE_TEACHER'))
            return $this->redirectToRoute('teacher_index');
        if ($this->isGranted('ROLE_ADMIN'))
            // return $this->redirectToRoute('user_edit', ['id' => 1]);
            return $this->redirectToRoute('admin_index');
        if ($this->isGranted('ROLE_SUPER_ADMIN'))
            return $this->redirectToRoute('super_admin_index');
    }
}
