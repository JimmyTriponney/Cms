<?php

namespace JT\MenuComposerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CprMenuItem
 *
 * @ORM\Table(name="cpr_menu_item")
 * @ORM\Entity(repositoryClass="JT\MenuComposerBundle\Repository\CprMenuItemRepository")
 */
class CprMenuItem
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
     * @ORM\ManyToOne(targetEntity="\JT\PageComposerBundle\Entity\CprPage", inversedBy="menuItem")
     */
    private $page;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=50, nullable=true)
     */
    private $icon;
	
	/**
	* @var Entity
	*
	* @ORM\ManyToMany(targetEntity="CprMenuDropdown", cascade={"persist","remove"}, orphanRemoval=true)
	*/
	private $dropdown;


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
     * @return CprMenuItem
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
     * @return CprMenuItem
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
     * @return CprMenuItem
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
     * @return CprMenuItem
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
     * Constructor
     */
    public function __construct()
    {
        $this->dropdown = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add dropdown
     *
     * @param \JT\MenuComposerBundle\Entity\CprMenuDropdown $dropdown
     *
     * @return CprMenuItem
     */
    public function addDropdown(\JT\MenuComposerBundle\Entity\CprMenuDropdown $dropdown)
    {
        $this->dropdown[] = $dropdown;

        return $this;
    }

    /**
     * Remove dropdown
     *
     * @param \JT\MenuComposerBundle\Entity\CprMenuDropdown $dropdown
     */
    public function removeDropdown(\JT\MenuComposerBundle\Entity\CprMenuDropdown $dropdown)
    {
        $this->dropdown->removeElement($dropdown);
    }

    /**
     * Get dropdown
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDropdown()
    {
        return $this->dropdown;
    }
}
