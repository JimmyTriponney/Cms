<?php

namespace JT\PageComposerBundle\Controller;

/*****************
*
*	Entity
*
*****************/
use JT\PageComposerBundle\Entity\CprPage;
use JT\PageComposerBundle\Entity\CprRow;
use JT\PageComposerBundle\Entity\CprColumn;
use JT\PageComposerBundle\Entity\CprColumnBlock;
use JT\PageComposerBundle\Entity\CprBlock;



/*****************
*
*	Form
*
*****************/
use JT\PageComposerBundle\Form\CprPageType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class interfaceController extends Controller
{
    public function viewAction(Request $request,$slug)
    {		
		
		$em = $this->getDoctrine()->getManager();//Recover the entity manager
		
		$page = $em->getRepository('JTPageComposerBundle:CprPage')->findOneBySlug($slug);
		
		if($page == null):
			$page = new CprPage();
		endif;
		
		$blocks = $em->getRepository('JTPageComposerBundle:CprBlock')->findAll();//Recover all blocks
						
		$form = $this->createForm(CprPageType::class, $page);//Create page composer form
		
		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()):
				
			$em->persist($page);
			$em->flush();
			
			return $this->redirectToRoute('jt_pagecomposer_edit',['slug'=>$page->getSlug()]);
						  
		endif;
			
        return $this->render('JTPageComposerBundle:composer:add.html.twig', array(
            'form' => $form->createView(),
			'blocks' => $blocks,
			'page' => $page
        ));
    }
	
	public function listAction()
	{
		$em = $this->getDoctrine()->getManager();
				
		/*$page = $em->getRepository('JTPageComposerBundle:CprPage')->findOneById(2);
		
		$em->remove($page);
		$em->flush();*/
		
		$allPages = $em->getRepository('JTPageComposerBundle:CprPage')->findAll();
		
		return $this->render('JTPageComposerBundle:composer:list.html.twig', array('pages' => $allPages));
	}
	
	public function deleteAction($id)
	{
		$em = $this->getDoctrine()->getManager();
		
		$page = $em->getRepository('JTPageComposerBundle:CprPage')->findOneById($id);
			
		$em->remove($page);
		$em->flush();
				
		return $this->redirectToRoute('jt_pagecomposer_list');
	}
	
}
