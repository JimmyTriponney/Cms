<?php

namespace JT\GaleryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CprGalery
 *
 * @ORM\Table(name="cpr_galery")
 * @ORM\Entity(repositoryClass="JT\GaleryBundle\Repository\CprGaleryRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class CprGalery
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
	 * @Gedmo\Slug(fields={"name"})
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="style", type="string", length=255, nullable=true)
     */
    private $style;
	
    /**
     * @var DateTime
     *
     * @ORM\Column(name="create_date", type="datetime", nullable=true)
     */
    private $createDate;
	
    /**
     * @var DateTime
     *
     * @ORM\Column(name="update_date", type="datetime", nullable=true)
     */
    private $updateDate;
	
    /**
     * Entity GaleryBlock
     *
     * @ORM\ManyToMany(targetEntity="CprGaleryBlock", cascade={"persist", "remove"})
     */
    private $block;
	
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
     * Set name
     *
     * @param string $name
     *
     * @return CprGalery
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
     * Set slug
     *
     * @param string $slug
     *
     * @return CprGalery
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set style
     *
     * @param string $style
     *
     * @return CprGalery
     */
    public function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return string
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Set createDate
     *
     * @param \DateTime $createDate
     *
     * @return CprGalery
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
     * @return CprGalery
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
	
	/**
	* @ORM\PrePersist
	*/
	public function prePersist()
	{
		$dateTime = new \DateTime();
		
		$this->setCreateDate($dateTime);
	}
	
	/**
	* @ORM\PreUpdate
	*/
	public function preUpdate()
	{
		$dateTime = new \DateTime();
		
		$this->setUpdateDate($dateTime);
	}
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->block = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add block
     *
     * @param \JT\GaleryBundle\Entity\CprGaleryBlock $block
     *
     * @return CprGalery
     */
    public function addBlock(\JT\GaleryBundle\Entity\CprGaleryBlock $block)
    {
        $this->block[] = $block;

        return $this;
    }

    /**
     * Remove block
     *
     * @param \JT\GaleryBundle\Entity\CprGaleryBlock $block
     */
    public function removeBlock(\JT\GaleryBundle\Entity\CprGaleryBlock $block)
    {
        $this->block->removeElement($block);
    }

    /**
     * Get block
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlock()
    {
        return $this->block;
    }
}
