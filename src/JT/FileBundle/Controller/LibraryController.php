<?php

namespace JT\FileBundle\Controller;

use JT\FileBundle\Entity\File;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class LibraryController extends Controller
{
	
	public function indexAction()
	{				
		return $this->render('JTFileBundle:library:index.html.twig');
	}
	
	public function panelAction()
	{
		return $this->render('JTFileBundle:library:panelLibrary.html.twig');
	}
	
    public function loadAction(Request $request)
    {
		$em = $this->getDoctrine()->getManager();
		
		
		$file = new File();
		$f = $_FILES['file'];
		$name = $_REQUEST['name'];
		$cryptName = $name;
		$tmp_name = $f['tmp_name'];
				
		$file->setName($name);
		$file->setDirectory($_POST['directory']);
		$file->setAlt($name);
		$file->setTitle($name);
		
		$response = $file->upload();
		
		if($response['end']):
			$size = filesize( $file->getUploadRootDir().$file->getNameCrypt() );
			
			$file->setSize($size);
			
			$em->persist($file);
			$em->flush();
			$response['id'] = $file->getId();
			$response['size'] = $file->getSize();
			$response['name'] = $file->getName();
			$response['alt'] = $file->getAlt();
			$response['title'] = $file->getTitle();
			$response['url'] = '/tlspp/web/JTFiles/'.$file->getDirectory().'/'.$file->getNameCrypt();
		endif;
		
		return new Response(json_encode($response));
    }
	
	public function modifAction()
	{
		$response = [];
		
		if(!isset($_POST) || empty($_POST['id']) ) return new Response(json_encode(['ok' => 0, 'message' => 'Une erreur est survenue, veuillez réessayer.']));
		
		$id = $_POST['id'];
		$alt = $_POST['alt'];
		$title = $_POST['title'];
		
		$em = $this->getDoctrine()->getManager();
		$file = $em->getRepository('JTFileBundle:File')->find($id);
		
		if(!$file) return new Response(json_encode(['ok' => 0, 'message' => 'Le fichier est introuvable.']));
		
		$file->setAlt($alt);
		$file->setTitle($title);
		
		$em->flush();
		
		return new Response(json_encode(['ok' => 1, 'message' => 'Les modifications ont été prises en compte.', 'alt' => $alt, 'title' => $title]));
	}
	
	public function allFilesAction()
	{
		$em = $this->getDoctrine()->getManager()->getRepository('JTFileBundle:File');
		
		$files = $em->findAll();
		
		return $this->render('JTFileBundle:library:allfiles.html.twig',['files' => $files]);
	}
}
