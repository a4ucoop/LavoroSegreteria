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
                ->where('LOWER(u.name) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.surname) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.address) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.cap) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.city) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.email) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.phone) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.birthDate) LIKE LOWER(:keyDate)')
                ->orWhere('LOWER(u.birthPlace) LIKE LOWER(:keyword)')
                //->orWhere('LOWER(u.attendedSchool) LIKE LOWER(:keyword)')
                //->orWhere('LOWER(u.attendedSchoolCity) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.activity) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.otherActivity) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.reference) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.otherReference) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.unicamCourse) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.fiscalcode) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.submissionDate) LIKE LOWER(:keyDate)')
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
                ->where('LOWER(u.name) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.surname) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.address) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.cap) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.city) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.email) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.phone) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.birthDate) LIKE LOWER(:keyDate)')
                ->orWhere('LOWER(u.birthPlace) LIKE LOWER(:keyword)')
                //->orWhere('LOWER(u.attendedSchool) LIKE LOWER(:keyword)')
                //->orWhere('LOWER(u.attendedSchoolCity) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.activity) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.otherActivity) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.reference) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.otherReference) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.unicamCourse) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.fiscalcode) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.submissionDate) LIKE LOWER(:keyDate)')
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

    public function searchStageAction(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            // $gsrch -> generic search keyword presa dal form di ricerca
            $gsrch = $request->get('srch-term');

            $mydate = date('Y-m-d', strtotime($gsrch));

            $repository = $this->getDoctrine()
                ->getRepository('A4UFormBundle:Stage')->createQueryBuilder('u')
                // LIKE restituisce tutto ciò che contiente il parametro dato come sottostringa
                ->where('LOWER(u.name) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.surname) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.address) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.cap) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.city) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.email) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.phone) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.birthDate) LIKE LOWER(:keyDate)')
                ->orWhere('LOWER(u.birthPlace) LIKE LOWER(:keyword)')
                //->orWhere('LOWER(u.attendedSchool) LIKE LOWER(:keyword)')
                //->orWhere('LOWER(u.attendedSchoolCity) LIKE LOWER(:keyword)')
                //->orWhere('LOWER(u.attendedSchoolDistrict) LIKE LOWER(:keyword)')
                //->orWhere('LOWER(u.attendedSchoolRegion) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.facebookContact) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.stagePeriod) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.firstStudyField) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.firstChoice) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.secondStudyField) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.secondChoice) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.moneyPayed) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.fiscalcode) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.submissiondate) LIKE LOWER(:keyDate)')
                ->orWhere('LOWER(u.schoolYear) LIKE LOWER(:keyDate)')
                ->setParameters(array(
                    'keyword' => ('%' . $gsrch . '%'),
                    'keyDate' => ('%' . $mydate . '%')
                ))
                ->getQuery();

            $users = $repository->getResult();
            return $this->render('A4UFormBundle:Forms:show_stage.html.twig', array(
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
                ->where('LOWER(u.name) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.surname) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.address) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.cap) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.city) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.email) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.birthDate) LIKE LOWER(:keyDate)')
                ->orWhere('LOWER(u.birthPlace) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.fiscalcode) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.attendedActivity) LIKE LOWER(:keyword)')
                ->orWhere('LOWER(u.submissionDate) LIKE LOWER(:keyDate)')
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
