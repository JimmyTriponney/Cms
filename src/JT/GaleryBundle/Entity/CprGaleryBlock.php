<?php

namespace JT\GaleryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CprGaleryBlock
 *
 * @ORM\Table(name="cpr_galery_block")
 * @ORM\Entity(repositoryClass="JT\GaleryBundle\Repository\CprGaleryBlockRepository")
 */
class CprGaleryBlock
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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @var int
     *
     * @ORM\Column(name="galeryOrder", type="integer", nullable=true)
     */
    private $galeryOrder;
			
    /**
     * @var string
     *
     * @ORM\Column(name="img_id", type="string", length=10, nullable=true)
	 * @ORM\ManyToOne(targetEntity="JTFileBundle:File")
     */
    private $img;
	

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
     * Set title
     *
     * @param string $title
     *
     * @return CprGaleryBlock
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
     * Set description
     *
     * @param string $description
     *
     * @return CprGaleryBlock
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return CprGaleryBlock
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set galeryOrder
     *
     * @param integer $galeryOrder
     *
     * @return CprGaleryBlock
     */
    public function setGaleryOrder($galeryOrder)
    {
        $this->galeryOrder = $galeryOrder;

        return $this;
    }

    /**
     * Get galeryOrder
     *
     * @return int
     */
    public function getGaleryOrder()
    {
        return $this->galeryOrder;
    }

    /**
     * Set img
     *
     * @param string $img
     *
     * @return CprGaleryBlock
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }
}
