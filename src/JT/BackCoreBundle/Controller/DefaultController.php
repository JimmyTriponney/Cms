<?php

namespace JT\BackCoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JTBackCoreBundle::layout.html.twig');
    }
}
