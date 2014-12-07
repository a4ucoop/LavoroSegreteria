<?php

namespace A4U\FormBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use A4U\FormBundle\Entity\PorteAperteInverno;

class FormController extends Controller
{
	public function searchPAIAction(Request $request)
	{
	    if ($request->getMethod() == 'GET') {
            // $gsrch -> generic search keyword presa dal form di ricerca
	        $gsrch = $request->get('srch-term');

            $mydate = date('Y-m-d', strtotime($gsrch));

	        $repository = $this->getDoctrine()
    			->getRepository('A4UFormBundle:PorteAperteInverno')->createQueryBuilder('u')
    			// LIKE restituisce tutto ciò che contiente il parametro dato come sottostringa
                ->where('u.name LIKE :keyword')
                ->orWhere('u.surname LIKE :keyword')
                ->orWhere('u.address LIKE :keyword')
                ->orWhere('u.cap LIKE :keyword')
                ->orWhere('u.city LIKE :keyword')
                ->orWhere('u.email LIKE :keyword')
                ->orWhere('u.phone LIKE :keyword')
                ->orWhere('u.birthDate LIKE :keyDate')
                ->orWhere('u.birthPlace LIKE :keyword')
                ->orWhere('u.attendedSchool LIKE :keyword')
                ->orWhere('u.attendedSchoolCity LIKE :keyword')
                ->orWhere('u.activity LIKE :keyword')
                ->orWhere('u.otherActivity LIKE :keyword')
                ->orWhere('u.reference LIKE :keyword')
                ->orWhere('u.otherReference LIKE :keyword')
                ->orWhere('u.unicamCourse LIKE :keyword')
                ->orWhere('u.fiscalcode LIKE :keyword')
                ->orWhere('u.submissionDate LIKE :keyDate')
                ->setParameters(array(
                    'keyword' => ('%' . $gsrch . '%'),
                    'keyDate' => ('%' . $mydate . '%')
                ))
    			->getQuery();

    		$users = $repository->getResult();
    		return $this->render('A4UFormBundle:Forms:show_porte_aperte_inverno.html.twig', array(
                'users' => $users,
                'lastSearch' => $gsrch
            ));

	    }
	}

    public function searchPAEAction(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            // $gsrch -> generic search keyword presa dal form di ricerca
            $gsrch = $request->get('srch-term');

            $mydate = date('Y-m-d', strtotime($gsrch));

            $repository = $this->getDoctrine()
                ->getRepository('A4UFormBundle:PorteAperteEstate')->createQueryBuilder('u')
                // LIKE restituisce tutto ciò che contiente il parametro dato come sottostringa
                ->where('u.name LIKE :keyword')
                ->orWhere('u.surname LIKE :keyword')
                ->orWhere('u.address LIKE :keyword')
                ->orWhere('u.cap LIKE :keyword')
                ->orWhere('u.city LIKE :keyword')
                ->orWhere('u.email LIKE :keyword')
                ->orWhere('u.phone LIKE :keyword')
                ->orWhere('u.birthDate LIKE :keyDate')
                ->orWhere('u.birthPlace LIKE :keyword')
                ->orWhere('u.attendedSchool LIKE :keyword')
                ->orWhere('u.attendedSchoolCity LIKE :keyword')
                ->orWhere('u.activity LIKE :keyword')
                ->orWhere('u.otherActivity LIKE :keyword')
                ->orWhere('u.reference LIKE :keyword')
                ->orWhere('u.otherReference LIKE :keyword')
                ->orWhere('u.unicamCourse LIKE :keyword')
                ->orWhere('u.fiscalcode LIKE :keyword')
                ->orWhere('u.submissionDate LIKE :keyDate')
                ->setParameters(array(
                    'keyword' => ('%' . $gsrch . '%'),
                    'keyDate' => ('%' . $mydate . '%')
                ))
                ->getQuery();

            $users = $repository->getResult();
            return $this->render('A4UFormBundle:Forms:show_porte_aperte_estate.html.twig', array(
                'users' => $users,
                'lastSearch' => $gsrch
            ));

        }
    }

    public function searchGenericoAction(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            // $gsrch -> generic search keyword presa dal form di ricerca
            $gsrch = $request->get('srch-term');

            $mydate = date('Y-m-d', strtotime($gsrch));

            $repository = $this->getDoctrine()
                ->getRepository('A4UFormBundle:Generico')->createQueryBuilder('u')
                // LIKE restituisce tutto ciò che contiente il parametro dato come sottostringa
                ->where('u.name LIKE :keyword')
                ->orWhere('u.surname LIKE :keyword')
                ->orWhere('u.address LIKE :keyword')
                ->orWhere('u.cap LIKE :keyword')
                ->orWhere('u.city LIKE :keyword')
                ->orWhere('u.email LIKE :keyword')
                ->orWhere('u.birthDate LIKE :keyDate')
                ->orWhere('u.birthPlace LIKE :keyword')
                ->orWhere('u.fiscalcode LIKE :keyword')
                ->orWhere('u.submissionDate LIKE :keyDate')
                ->setParameters(array(
                    'keyword' => ('%' . $gsrch . '%'),
                    'keyDate' => ('%' . $mydate . '%')
                ))
                ->getQuery();

            $users = $repository->getResult();
            return $this->render('A4UFormBundle:Forms:show_generico.html.twig', array(
                'users' => $users,
                'lastSearch' => $gsrch
            ));

        }
    }
}
