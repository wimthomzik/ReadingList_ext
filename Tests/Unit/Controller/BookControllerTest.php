<?php
namespace Readinglist\Readinglist\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Wim Thomzik <wim@thomzik.de>
 */
class BookControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Readinglist\Readinglist\Controller\BookController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Readinglist\Readinglist\Controller\BookController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllBooksFromRepositoryAndAssignsThemToView()
    {

        $allBooks = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $bookRepository = $this->getMockBuilder(\Readinglist\Readinglist\Domain\Repository\BookRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $bookRepository->expects(self::once())->method('findAll')->will(self::returnValue($allBooks));
        $this->inject($this->subject, 'bookRepository', $bookRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('books', $allBooks);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenBookToView()
    {
        $book = new \Readinglist\Readinglist\Domain\Model\Book();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('book', $book);

        $this->subject->showAction($book);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenBookToBookRepository()
    {
        $book = new \Readinglist\Readinglist\Domain\Model\Book();

        $bookRepository = $this->getMockBuilder(\Readinglist\Readinglist\Domain\Repository\BookRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $bookRepository->expects(self::once())->method('add')->with($book);
        $this->inject($this->subject, 'bookRepository', $bookRepository);

        $this->subject->createAction($book);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenBookToView()
    {
        $book = new \Readinglist\Readinglist\Domain\Model\Book();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('book', $book);

        $this->subject->editAction($book);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenBookInBookRepository()
    {
        $book = new \Readinglist\Readinglist\Domain\Model\Book();

        $bookRepository = $this->getMockBuilder(\Readinglist\Readinglist\Domain\Repository\BookRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $bookRepository->expects(self::once())->method('update')->with($book);
        $this->inject($this->subject, 'bookRepository', $bookRepository);

        $this->subject->updateAction($book);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenBookFromBookRepository()
    {
        $book = new \Readinglist\Readinglist\Domain\Model\Book();

        $bookRepository = $this->getMockBuilder(\Readinglist\Readinglist\Domain\Repository\BookRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $bookRepository->expects(self::once())->method('remove')->with($book);
        $this->inject($this->subject, 'bookRepository', $bookRepository);

        $this->subject->deleteAction($book);
    }
}
