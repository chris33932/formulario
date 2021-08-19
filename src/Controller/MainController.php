<?php

namespace App\Controller;

use App\Entity\Exp;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(Request $request)
    {
        $user = new User();
        $user->setFullname('Lic. MIranda Christian');
        $exp = new Exp();
        $exp ->setTitle('Desarrollador');
        $exp ->setLocation('Ministerio de Educación');
        $exp->setDateFrom(new \DateTime());
        $exp->setDateTo(new \DateTime());

        $user->addExp($exp);
        $form = $this->createForm(UserType::class, $user);




        $form->handleRequest($request);

        if ($form->isSubmitted()){
            dump($user);
        }
        return $this->render('main/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
