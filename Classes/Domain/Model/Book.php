<?php
namespace Readinglist\Readinglist\Domain\Model;


/***
 *
 * This file is part of the "readinglist" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2022 Wim Thomzik <wim@thomzik.de>
 *
 ***/
/**
 * Book
 */
class Book extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     * 
     * @var string
     */
    protected $name = '';

    /**
     * isbn
     * 
     * @var int
     */
    protected $isbn = 0;

    /**
     * category
     * 
     * @var \Readinglist\Readinglist\Domain\Model\Category
     */
    protected $category = null;

    /**
     * author
     * 
     * @var \Readinglist\Readinglist\Domain\Model\Author
     */
    protected $author = null;

    /**
     * status
     * 
     * @var \Readinglist\Readinglist\Domain\Model\ReadingStatus
     */
    protected $status = null;

    /**
     * Returns the name
     * 
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     * 
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the isbn
     * 
     * @return int $isbn
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Sets the isbn
     * 
     * @param int $isbn
     * @return void
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * Returns the category
     * 
     * @return \Readinglist\Readinglist\Domain\Model\Category $category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the category
     * 
     * @param \Readinglist\Readinglist\Domain\Model\Category $category
     * @return void
     */
    public function setCategory(\Readinglist\Readinglist\Domain\Model\Category $category)
    {
        $this->category = $category;
    }

    /**
     * Returns the author
     * 
     * @return \Readinglist\Readinglist\Domain\Model\Author $author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the author
     * 
     * @param \Readinglist\Readinglist\Domain\Model\Author $author
     * @return void
     */
    public function setAuthor(\Readinglist\Readinglist\Domain\Model\Author $author)
    {
        $this->author = $author;
    }

    /**
     * Returns the status
     * 
     * @return \Readinglist\Readinglist\Domain\Model\ReadingStatus $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the status
     * 
     * @param \Readinglist\Readinglist\Domain\Model\ReadingStatus $status
     * @return void
     */
    public function setStatus(\Readinglist\Readinglist\Domain\Model\ReadingStatus $status)
    {
        $this->status = $status;
    }
}
