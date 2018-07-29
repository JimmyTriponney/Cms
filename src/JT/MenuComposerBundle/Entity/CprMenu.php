<?php

namespace JT\MenuComposerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CprMenu
 *
 * @ORM\Table(name="cpr_menu")
 * @ORM\Entity(repositoryClass="JT\MenuComposerBundle\Repository\CprMenuRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class CprMenu
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
     * @var datetime
     *
     * @ORM\Column(name="update_date", type="datetime", nullable=true)
     */
    private $updateDate;
	
	/**
	* @var Entity
	*
	* @ORM\ManyToMany(targetEntity="CprMenuItem", cascade={"persist" , "remove"}, orphanRemoval=true)
	*/
	private $item;
	


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
	* @ORM\PrePersist
	*/
	public function prePersist()
	{
		$dateTime = new \DateTime();
		
		$this->setUpdateDate($dateTime);
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
        $this->item = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set updateDate
     *
     * @param \DateTime $updateDate
     *
     * @return CprMenu
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
     * Add item
     *
     * @param \JT\MenuComposerBundle\Entity\CprMenuItem $item
     *
     * @return CprMenu
     */
    public function addItem(\JT\MenuComposerBundle\Entity\CprMenuItem $item)
    {
        $this->item[] = $item;

        return $this;
    }

    /**
     * Remove item
     *
     * @param \JT\MenuComposerBundle\Entity\CprMenuItem $item
     */
    public function removeItem(\JT\MenuComposerBundle\Entity\CprMenuItem $item)
    {
        $this->item->removeElement($item);
    }

    /**
     * Get item
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItem()
    {
        return $this->item;
    }
}
