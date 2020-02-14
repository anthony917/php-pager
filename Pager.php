<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15/2/2020
 * Time: 2:30
 */
class Pager
{
    public function __construct($link, $currentPage, $itemPerPage, $pageWidth, $totalItems)
    {
        $this->link = $link;
        $this->currentPage = $currentPage;
        $this->itemPerPage = $itemPerPage;
        $this->pagerWidth = $pageWidth;
        $this->pagerWidth2 = floor($pageWidth / 2);
        $this->totalItems = $totalItems;
        $this->totalPages = ceil($totalItems / $itemPerPage);
    }

    public function hasPrev()
    {
        $previous = $this->getCurrentPage() - 1;
        return $previous >= 1;
    }

    public function hasNext()
    {
        $next = $this->getCurrentPage() + 1;
        return $next <= $this->getEndPage();
    }

    public function getLink()
    {
        return $this->link;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function getStartPage()
    {
        return 1;
    }

    public function getEndPage()
    {
        return $this->totalPages;
    }
}