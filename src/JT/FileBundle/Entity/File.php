<?php

namespace JT\FileBundle\Entity;

use JT\FileBundle\Repository\FileRepository;

use Doctrine\ORM\Mapping as ORM;

/**
 * File
 *
 * @ORM\Table(name="file")
 * @ORM\Entity(repositoryClass="JT\FileBundle\Repository\FileRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class File
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nameCrypt", type="string", length=255, unique=true)
     */
    private $nameCrypt;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255, nullable=true)
     */
    private $alt;

    /**
     * @var string
     *
     * @ORM\Column(name="directory", type="string", length=255)
     */
    private $directory;
	
    /**
     * @var integer
     *
     * @ORM\Column(name="size", type="integer", length=20, nullable=true)
     */
    private $size;
	
    /**
     * @var date
     *
     * @ORM\Column(name="create_date", type="datetime", nullable=true)
     */
    private $createDate;
	
    /**
     * @var date
     *
     * @ORM\Column(name="update_date", type="datetime", nullable=true)
     */
    private $updateDate;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nameCrypt
     *
     * @param string $nameCrypt
     *
     * @return File
     */
    public function setNameCrypt($nameCrypt)
    {
        $this->nameCrypt = $nameCrypt;

        return $this;
    }

    /**
     * Get nameCrypt
     *
     * @return string
     */
    public function getNameCrypt()
    {
        return $this->nameCrypt;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return File
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return File
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return File
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }
	
    public function getUploadDir()
    {
      // On retourne le chemin relatif vers l'image pour un navigateur (relatif au répertoire /web donc)
      return 'JTFiles/'.$this->getDirectory();
    }
    
    public function getUploadRootDir()
    {
      // On retourne le chemin relatif vers l'image pour notre code PHP
      return __DIR__.'/../../../../web/'.$this->getUploadDir().'/';
    }
	
    /**
     * Set directory
     *
     * @param string $directory
     *
     * @return File
     */
    public function setDirectory($directory)
    {
        $this->directory = $directory;

        return $this;
    }

    /**
     * Get directory
     *
     * @return string
     */
    public function getDirectory()
    {
        return $this->directory;
    }


    /**
     * Set size
     *
     * @param integer $size
     *
     * @return File
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set createDate
     *
     * @param \DateTime $createDate
     *
     * @return File
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get createDate
     *
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set updateDate
     *
     * @param \DateTime $updateDate
     *
     * @return File
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
     * Get updateDate
     *
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }
	
	public function upload()
	{
		
		if(!is_dir($this->getUploadRootDir()))mkdir($this->getUploadRootDir(), 0777, true);
		
		if(!empty($_FILES) || !$_FILES['file']['error'] ):
		
			$chunk = isset($_REQUEST['chunk']) ? intval($_REQUEST['chunk']) : 0;
			$chunks = isset($_REQUEST['chunks']) ? intval($_REQUEST['chunks']) : 0;
			
			$fileName = isset($_REQUEST['name']) ? $_REQUEST['name'] : $_FILES['file']['name'];
			$filePath = $this->getUploadRootDir().$this->name;
			
			if($chunk > 0 && !is_file("{$filePath}.part"))return ['ok' => 0, 'message' => $this->name.' : Téléchargement échoué.', 'end' => 0];
			
			// Open temp file
			$out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
			if($out):
			
				$in = @fopen($_FILES['file']['tmp_name'], "rb");
			
				if($in):
					while($buff = fread($in, 4096)) fwrite($out, $buff);
				
					@fclose($in);
					@fclose($out);
					@unlink($_FILES['file']['tmp_name']);
										
					// Check if file has been uploaded
					if( (!$chunks || $chunk == $chunks-1) && is_file("{$filePath}.part") ):	
						rename("{$filePath}.part", $filePath);
						return ['ok' => 1, 'message' => $this->name.' : Téléchargement terminé.', 'end' => 1];
					
					elseif(!$chunks || $chunk == $chunks-1):
						if(is_file("{$filePath}.part")) @unlink("{$filePath}.part");
						return ['ok' => 0, 'message' => $this->name.' : Téléchargement échoué.', 'end' => 0];					
					
					else:
						return ['ok' => 1, 'message' => $this->name.' : Téléchargement en cours.', 'chunk' => $chunk, 'chunks' => $chunks, 'end' => 0];
					endif;
				
				else:
					if(is_file("{$filePath}.part")) @unlink("{$filePath}.part");
					return ['ok' => 0, 'message' => $this->name.' : Impossible d\'ouvrir le fichier.', 'end' => 0];
				endif;
				
			else :
				if(is_file("{$filePath}.part")) @unlink("{$filePath}.part");
				return ['ok' => 0, 'message' => $this->name.' : Impossible d\'ouvrir le fichier dans le serveur.', 'end' => 0];
			endif;
		
		else:
			return ['ok' => 0, 'message' => $this->name.' : Téléchargement échoué.', 'end' => 0];
		endif;
		
	}
	
	/**
	* @ORM\PrePersist
	*/
	public function prePersist()
	{
		$dateTime = new \DateTime();
		$this->setCreateDate($dateTime);
		
		$this->setNameCrypt(date("YmdHis").$this->name);
		rename($this->getUploadRootDir().$this->name, $this->getUploadRootDir().$this->getNameCrypt());
	}
	
	/**
	* @ORM\PreUpdate
	*/
	public function preUpdate()
	{
		$dateTime = new \DateTime();
		$this->setUpdateDate($dateTime);
	}
}
