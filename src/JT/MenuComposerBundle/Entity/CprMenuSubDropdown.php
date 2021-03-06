<?php

namespace JT\MenuComposerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CprMenuSubDropdown
 *
 * @ORM\Table(name="cpr_menu_sub_dropdown")
 * @ORM\Entity(repositoryClass="JT\MenuComposerBundle\Repository\CprMenuSubDropdownRepository")
 */
class CprMenuSubDropdown
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
     * @ORM\Column(name="label", type="string", length=255, nullable=true)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="\JT\PageComposerBundle\Entity\CprPage", inversedBy="menuSubDropdown")
     */
    private $page;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=50, nullable=true)
     */
    private $icon;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="\JT\FileBundle\Entity\File")
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
     * Set label
     *
     * @param string $label
     *
     * @return CprMenuSubDropdown
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return CprMenuSubDropdown
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
     * Set page
     *
     * @param string $page
     *
     * @return CprMenuSubDropdown
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return string
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set icon
     *
     * @param string $icon
     *
     * @return CprMenuSubDropdown
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return CprMenuSubDropdown
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
     * Set img
     *
     * @param \JT\FileBundle\Entity\File $img
	 *
     * @return CprMenuSubDropdown
     */
    public function setImg(\JT\FileBundle\Entity\File $img = null)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return \JT\FileBundle\Entity\File
     */
    public function getImg()
    {
        return $this->img;
    }
}
