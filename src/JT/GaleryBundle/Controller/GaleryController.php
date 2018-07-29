<?php

namespace JT\GaleryBundle\Controller;

use JT\GaleryBundle\Entity\CprGalery;
use JT\GaleryBundle\Form\CprGaleryType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GaleryController extends Controller
{
    public function addAction(Request $request)
    {
		$em = $this->getDoctrine()->getManager();//Recover the entity manager

		$galery = new CprGalery();
		
		$form = $this->createForm(CprGaleryType::class, $galery);//Create galery composer form
		
		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()):
				
			$em->persist($galery);
			$em->flush();
			
			return $this->redirectToRoute('jt_galery_homepage');
						  
		endif;
		
        return $this->render('JTGaleryBundle:gallery:index.html.twig', array(
            'form' => $form->createView()
        ));
    }

}
