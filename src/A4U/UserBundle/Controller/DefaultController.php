<?php

namespace A4U\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('A4UUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
