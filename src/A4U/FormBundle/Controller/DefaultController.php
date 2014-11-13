<?php

namespace A4U\FormBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('A4UFormBundle:Default:index.html.twig', array('name' => $name));
    }
}
