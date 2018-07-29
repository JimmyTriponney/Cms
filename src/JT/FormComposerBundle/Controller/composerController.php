<?php

namespace JT\FormComposerBundle\Controller;

use JT\FormComposerBundle\Entity\CprForm;
use JT\FormComposerBundle\Entity\CprFormField;
use JT\FormComposerBundle\Form\CprFormType;
use JT\FormComposerBundle\Form\CprFormFieldType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class composerController extends Controller
{

    public function addAction(Request $request, $slug = null)
    {		
		$em = $this->getDoctrine()->getManager();
		
		$fieldList = $em->getRepository('JTFormComposerBundle:CprFormFieldList')->findAll();
		
		$f = null;
		
		if($slug != null):
			$f = $em->getRepository('JTFormComposerBundle:CprForm')->findOneBySlug($slug);
		endif;	
		
		if($f == null):
			$f = new CprForm();
		endif;
		
		$form = $this->createForm(CprFormType::class, $f);
		
		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()):
				
			$em->persist($f);
			$em->flush();
			
			return $this->redirectToRoute('jt_form_composer_edit',['slug'=>$f->getSlug()]);
						  
		endif;
		
		
        return $this->render('JTFormComposerBundle:composer:add.html.twig', array(
            "fieldList" => $fieldList,
			'form' => $form->createView()
        ));
				
    }

	public function listAction()
	{
		$em = $this->getDoctrine()->getManager();
		
		$allForm = $em->getRepository('JTFormComposerBundle:CprForm')->findAll();
		
		return $this->render('JTFormComposerBundle:composer:list.html.twig', array('forms' => $allForm));
	}
	
	public function deleteAction($id)
	{
		$em = $this->getDoctrine()->getManager();
		
		$form = $em->getRepository('JTFormComposerBundle:CprForm')->findOneById($id);
			
		$em->remove($form);
		$em->flush();
				
		return $this->redirectToRoute('jt_form_composer_list');
	}

}
