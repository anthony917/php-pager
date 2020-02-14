<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15/2/2020
 * Time: 2:57
 */
require "Pager.php";

class PagerTest extends PHPUnit\Framework\TestCase
{
    private $link = "http://www.google.com/search?q=foobar";
    private $pageWidth = 8;
    private $itemPerPage = 10;
    private $pagerEmpty;

    protected function setUp(): void
    {
        $this->pagerEmpty = new Pager($this->link,1, $this->itemPerPage, $this->pageWidth, 0);
    }

    public function testHasPrev(){
        $pagerWithoutPrev = new Pager($this->link,1, $this->itemPerPage, $this->pageWidth, 2000);
        $this->assertFalse($pagerWithoutPrev->hasPrev());
        $pagerWithPrev = new Pager($this->link,2, 10, $this->pageWidth, 2000);
        $this->assertTrue($pagerWithPrev->hasPrev());
        $this->assertFalse($this->pagerEmpty->hasPrev());
    }

    public function testHasNext(){
        $pagerWithoutNext = new Pager($this->link,200, 10, $this->pageWidth, 2000);
        $this->assertFalse($pagerWithoutNext->hasNext());
        $pagerWithNext = new Pager($this->link,1, 10, $this->pageWidth, 2000);
        $this->assertTrue($pagerWithNext->hasNext());
        $this->assertFalse($this->pagerEmpty->hasNext());
    }

    public function testGetLink(){
        $pager = new Pager($this->link,1, $this->itemPerPage, $this->pageWidth, 2000);
        $this->assertEquals($this->link, $pager->getLink());
        $otherLink = "http://www.google.com/search?q=foobar2";
        $otherPager = new Pager($otherLink, 1, $this->itemPerPage, $this->pageWidth, 2000);
        $this->assertEquals($otherLink, $otherPager->getLink());
        $this->assertEquals($this->link, $pager->getLink());
    }

    public function testGetCurrentPage(){
        $currentPage = 1;
        $pager = new Pager($this->link,$currentPage, $this->itemPerPage, $this->pageWidth, 2000);
        $this->assertEquals($currentPage, $pager->getCurrentPage());
        $currentPage = 10;
        $otherPager = new Pager($this->link,$currentPage, $this->itemPerPage, $this->pageWidth, 2000);
        $this->assertEquals($currentPage, $otherPager->getCurrentPage());
    }

    public function testGetStartPage(){
        $pager = new Pager($this->link,1, $this->itemPerPage, $this->pageWidth, 2000);
        $this->assertEquals(1, $pager->getStartPage());
        $this->assertEquals(1, $this->pagerEmpty->getStartPage());
    }

    public function testGetEndPage(){
        $pager = new Pager($this->link,1, $this->itemPerPage, $this->pageWidth, 2000);
        $this->assertEquals($pager->totalPages, $pager->getEndPage());
        $this->assertEquals($this->pagerEmpty->totalPages, $this->pagerEmpty->getEndPage());
    }
}