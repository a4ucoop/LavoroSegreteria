<?php

namespace A4U\FormBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
	public function indexAction()
	{
		return $this->render('A4UFormBundle:Default:homepage.html.twig');
	}

	public function porte_aperte_estate()
	{
		return $this->render('A4UFormBundle:Default:');
	}
}
