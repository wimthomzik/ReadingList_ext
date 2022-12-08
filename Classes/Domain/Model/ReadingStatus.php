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
 * ReadingStatus
 */
class ReadingStatus extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * status
     * 
     * @var bool
     */
    protected $status = false;

    /**
     * Returns the status
     * 
     * @return bool $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the status
     * 
     * @param bool $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Returns the boolean state of status
     * 
     * @return bool
     */
    public function isStatus()
    {
        return $this->status;
    }
}
