<?php

namespace JT\SiteCoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SiteController extends Controller
{
    public function pageAction($slug)
    {
		$em = $this->getDoctrine()->getManager();
		
		$menu = $em->getRepository('JTMenuComposerBundle:CprMenu')->find(1);
		
		$page = $em->getRepository('JTPageComposerBundle:CprPage')->findOneBySlug($slug);
		
        return $this->render('JTSiteCoreBundle:Pages:core.html.twig',
			[
				'menu' => $menu,
				'page' => $page
			]);
    }
}
