<?php

namespace JT\MenuComposerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use JT\MenuComposerBundle\Form\CprMenuType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JTMenuComposerBundle:Default:index.html.twig');
    }
	
    public function editAction(Request $request)
    {
		$id = 1;
		
		$em = $this->getDoctrine()->getManager();
		
		$menu = $em->getRepository('JTMenuComposerBundle:CprMenu')->findOneById($id);
		
		$form = $this->createForm(CprMenuType::class, $menu);
		
		if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
		{
			$em->persist($menu);
			$em->flush();
		}
		
        return $this->render('JTMenuComposerBundle:Default:edit.html.twig',
			[
				'form' => $form->createView()
			]);
    }
}
