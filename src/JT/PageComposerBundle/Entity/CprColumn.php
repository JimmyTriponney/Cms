<?php

namespace JT\PageComposerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CprColumn
 *
 * @ORM\Table(name="cpr_column")
 * @ORM\Entity(repositoryClass="JT\PageComposerBundle\Repository\CprColumnRepository")
 */
class CprColumn
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
     * @var int
     *
     * @ORM\Column(name="padding_top", type="integer", nullable=true)
     */
    private $paddingTop;

    /**
     * @var int
     *
     * @ORM\Column(name="padding_left", type="integer", nullable=true)
     */
    private $paddingLeft;

    /**
     * @var int
     *
     * @ORM\Column(name="padding_bottom", type="integer", nullable=true)
     */
    private $paddingBottom;

    /**
     * @var int
     *
     * @ORM\Column(name="padding_right", type="integer", nullable=true)
     */
    private $paddingRight;

    /**
     * @var string
     *
     * @ORM\Column(name="border_style", type="string", length=20, nullable=true)
     */
    private $borderStyle;

    /**
     * @var string
     *
     * @ORM\Column(name="border_color", type="string", length=10, nullable=true)
     */
    private $borderColor;

    /**
     * @var int
     *
     * @ORM\Column(name="border_size", type="integer", nullable=true)
     */
    private $borderSize;

    /**
     * @var int
     *
     * @ORM\Column(name="border_radius", type="integer", nullable=true)
     */
    private $borderRadius;

    /**
     * @var string
     *
     * @ORM\Column(name="bg_color", type="string", length=10, nullable=true)
     */
    private $bgColor;
	
	
    /**
     * @var string
     *
	 * @ORM\ManyToOne(targetEntity="JT\FileBundle\Entity\File")
     */
    private $bgImg;

    /**
     * @var int
     *
     * @ORM\Column(name="page_order", type="integer", nullable=true)
     */
    private $pageOrder;
	
    /**
     * Entity ColumnBlock
     *
     * @ORM\ManyToMany(targetEntity="CprColumnBlock", cascade="all", orphanRemoval=true)
	 * @ORM\JoinColumn(nullable=false)
     */
    private $block;
			
    /**
     * @var integer
     *
     * @ORM\Column(name="col_xs", type="integer", length=10, nullable=true)
     */
    private $colXs;
			
    /**
     * @var integer
     *
     * @ORM\Column(name="col_sm", type="integer", length=10, nullable=true)
     */
    private $colSm;
			
    /**
     * @var integer
     *
     * @ORM\Column(name="col_md", type="integer", length=10, nullable=true)
     */
    private $colMd;
			
    /**
     * @var integer
     *
     * @ORM\Column(name="col_lg", type="integer", length=10, nullable=true)
     */
    private $colLg;
	
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
     * Set paddingTop
     *
     * @param integer $paddingTop
     *
     * @return CprColumn
     */
    public function setPaddingTop($paddingTop)
    {
        $this->paddingTop = $paddingTop;

        return $this;
    }

    /**
     * Get paddingTop
     *
     * @return integer
     */
    public function getPaddingTop()
    {
        return $this->paddingTop;
    }

    /**
     * Set paddingLeft
     *
     * @param integer $paddingLeft
     *
     * @return CprColumn
     */
    public function setPaddingLeft($paddingLeft)
    {
        $this->paddingLeft = $paddingLeft;

        return $this;
    }

    /**
     * Get paddingLeft
     *
     * @return integer
     */
    public function getPaddingLeft()
    {
        return $this->paddingLeft;
    }

    /**
     * Set paddingBottom
     *
     * @param integer $paddingBottom
     *
     * @return CprColumn
     */
    public function setPaddingBottom($paddingBottom)
    {
        $this->paddingBottom = $paddingBottom;

        return $this;
    }

    /**
     * Get paddingBottom
     *
     * @return integer
     */
    public function getPaddingBottom()
    {
        return $this->paddingBottom;
    }

    /**
     * Set paddingRight
     *
     * @param integer $paddingRight
     *
     * @return CprColumn
     */
    public function setPaddingRight($paddingRight)
    {
        $this->paddingRight = $paddingRight;

        return $this;
    }

    /**
     * Get paddingRight
     *
     * @return integer
     */
    public function getPaddingRight()
    {
        return $this->paddingRight;
    }

    /**
     * Set borderStyle
     *
     * @param string $borderStyle
     *
     * @return CprColumn
     */
    public function setBorderStyle($borderStyle)
    {
        $this->borderStyle = $borderStyle;

        return $this;
    }

    /**
     * Get borderStyle
     *
     * @return string
     */
    public function getBorderStyle()
    {
        return $this->borderStyle;
    }

    /**
     * Set borderColor
     *
     * @param string $borderColor
     *
     * @return CprColumn
     */
    public function setBorderColor($borderColor)
    {
        $this->borderColor = $borderColor;

        return $this;
    }

    /**
     * Get borderColor
     *
     * @return string
     */
    public function getBorderColor()
    {
        return $this->borderColor;
    }

    /**
     * Set borderSize
     *
     * @param integer $borderSize
     *
     * @return CprColumn
     */
    public function setBorderSize($borderSize)
    {
        $this->borderSize = $borderSize;

        return $this;
    }

    /**
     * Get borderSize
     *
     * @return integer
     */
    public function getBorderSize()
    {
        return $this->borderSize;
    }

    /**
     * Set borderRadius
     *
     * @param integer $borderRadius
     *
     * @return CprColumn
     */
    public function setBorderRadius($borderRadius)
    {
        $this->borderRadius = $borderRadius;

        return $this;
    }

    /**
     * Get borderRadius
     *
     * @return integer
     */
    public function getBorderRadius()
    {
        return $this->borderRadius;
    }

    /**
     * Set bgColor
     *
     * @param string $bgColor
     *
     * @return CprColumn
     */
    public function setBgColor($bgColor)
    {
        $this->bgColor = $bgColor;

        return $this;
    }

    /**
     * Get bgColor
     *
     * @return string
     */
    public function getBgColor()
    {
        return $this->bgColor;
    }

    /**
     * Set pageOrder
     *
     * @param integer $pageOrder
     *
     * @return CprColumn
     */
    public function setPageOrder($pageOrder)
    {
        $this->pageOrder = $pageOrder;

        return $this;
    }

    /**
     * Get pageOrder
     *
     * @return integer
     */
    public function getPageOrder()
    {
        return $this->pageOrder;
    }

    /**
     * Add block
     *
     * @param \JT\PageComposerBundle\Entity\CprColumnBlock $block
     *
     * @return CprColumn
     */
    public function addBlock(\JT\PageComposerBundle\Entity\CprColumnBlock $block)
    {
        $this->block[] = $block;

        return $this;
    }

    /**
     * Remove block
     *
     * @param \JT\PageComposerBundle\Entity\CprColumnBlock $block
     */
    public function removeBlock(\JT\PageComposerBundle\Entity\CprColumnBlock $block)
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

    /**
     * Set colXs
     *
     * @param string $colXs
     *
     * @return CprColumn
     */
    public function setColXs($colXs)
    {
        $this->colXs = $colXs;

        return $this;
    }

    /**
     * Get colXs
     *
     * @return string
     */
    public function getColXs()
    {
        return $this->colXs;
    }

    /**
     * Set colSm
     *
     * @param string $colSm
     *
     * @return CprColumn
     */
    public function setColSm($colSm)
    {
        $this->colSm = $colSm;

        return $this;
    }

    /**
     * Get colSm
     *
     * @return string
     */
    public function getColSm()
    {
        return $this->colSm;
    }

    /**
     * Set colMd
     *
     * @param string $colMd
     *
     * @return CprColumn
     */
    public function setColMd($colMd)
    {
        $this->colMd = $colMd;

        return $this;
    }

    /**
     * Get colMd
     *
     * @return string
     */
    public function getColMd()
    {
        return $this->colMd;
    }

    /**
     * Set colLg
     *
     * @param string $colLg
     *
     * @return CprColumn
     */
    public function setColLg($colLg)
    {
        $this->colLg = $colLg;

        return $this;
    }

    /**
     * Get colLg
     *
     * @return string
     */
    public function getColLg()
    {
        return $this->colLg;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->block = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set bgImg
     *
     * @param \JT\FileBundle\Entity\File $bgImg
     *
     * @return CprColumn
     */
    public function setBgImg(\JT\FileBundle\Entity\File $bgImg = null)
    {
        $this->bgImg = $bgImg;

        return $this;
    }

    /**
     * Get bgImg
     *
     * @return \JT\FileBundle\Entity\File
     */
    public function getBgImg()
    {
        return $this->bgImg;
    }
}
