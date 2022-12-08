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
 * BookController
 */
class BookController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * bookRepository
     * 
     * @var \Readinglist\Readinglist\Domain\Repository\BookRepository
     */
    protected $bookRepository = null;

    /**
     * @param \Readinglist\Readinglist\Domain\Repository\BookRepository $bookRepository
     */
    public function injectBookRepository(\Readinglist\Readinglist\Domain\Repository\BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $books = $this->bookRepository->findAll();
        $this->view->assign('books', $books);
    }

    /**
     * action show
     * 
     * @param \Readinglist\Readinglist\Domain\Model\Book $book
     * @return void
     */
    public function showAction(\Readinglist\Readinglist\Domain\Model\Book $book)
    {
        $this->view->assign('book', $book);
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
     * @param \Readinglist\Readinglist\Domain\Model\Book $newBook
     * @return void
     */
    public function createAction(\Readinglist\Readinglist\Domain\Model\Book $newBook)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->bookRepository->add($newBook);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \Readinglist\Readinglist\Domain\Model\Book $book
     * @ignorevalidation $book
     * @return void
     */
    public function editAction(\Readinglist\Readinglist\Domain\Model\Book $book)
    {
        $this->view->assign('book', $book);
    }

    /**
     * action update
     * 
     * @param \Readinglist\Readinglist\Domain\Model\Book $book
     * @return void
     */
    public function updateAction(\Readinglist\Readinglist\Domain\Model\Book $book)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->bookRepository->update($book);
        $this->redirect('list');
    }

    /**
     * action delete
     * 
     * @param \Readinglist\Readinglist\Domain\Model\Book $book
     * @return void
     */
    public function deleteAction(\Readinglist\Readinglist\Domain\Model\Book $book)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->bookRepository->remove($book);
        $this->redirect('list');
    }

    /**
     * action filter
     * 
     * @return void
     */
    public function filterAction()
    {
    }
}
