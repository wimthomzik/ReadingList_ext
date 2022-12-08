<?php
namespace Readinglist\Readinglist\Controller;


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
 * ReadingStatusController
 */
class ReadingStatusController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $readingStatuses = $this->readingStatusRepository->findAll();
        $this->view->assign('readingStatuses', $readingStatuses);
    }

    /**
     * action show
     * 
     * @param \Readinglist\Readinglist\Domain\Model\ReadingStatus $readingStatus
     * @return void
     */
    public function showAction(\Readinglist\Readinglist\Domain\Model\ReadingStatus $readingStatus)
    {
        $this->view->assign('readingStatus', $readingStatus);
    }

    /**
     * action new
     * 
     * @return void
     */
    public function newAction()
    {
    }

    /**
     * action create
     * 
     * @param \Readinglist\Readinglist\Domain\Model\ReadingStatus $newReadingStatus
     * @return void
     */
    public function createAction(\Readinglist\Readinglist\Domain\Model\ReadingStatus $newReadingStatus)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->readingStatusRepository->add($newReadingStatus);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \Readinglist\Readinglist\Domain\Model\ReadingStatus $readingStatus
     * @ignorevalidation $readingStatus
     * @return void
     */
    public function editAction(\Readinglist\Readinglist\Domain\Model\ReadingStatus $readingStatus)
    {
        $this->view->assign('readingStatus', $readingStatus);
    }

    /**
     * action update
     * 
     * @param \Readinglist\Readinglist\Domain\Model\ReadingStatus $readingStatus
     * @return void
     */
    public function updateAction(\Readinglist\Readinglist\Domain\Model\ReadingStatus $readingStatus)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->readingStatusRepository->update($readingStatus);
        $this->redirect('list');
    }

    /**
     * action delete
     * 
     * @param \Readinglist\Readinglist\Domain\Model\ReadingStatus $readingStatus
     * @return void
     */
    public function deleteAction(\Readinglist\Readinglist\Domain\Model\ReadingStatus $readingStatus)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->readingStatusRepository->remove($readingStatus);
        $this->redirect('list');
    }
}
