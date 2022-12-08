<?php
namespace Readinglist\Readinglist\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Wim Thomzik <wim@thomzik.de>
 */
class AuthorControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Readinglist\Readinglist\Controller\AuthorController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Readinglist\Readinglist\Controller\AuthorController::class)
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
    public function listActionFetchesAllAuthorsFromRepositoryAndAssignsThemToView()
    {

        $allAuthors = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $authorRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $authorRepository->expects(self::once())->method('findAll')->will(self::returnValue($allAuthors));
        $this->inject($this->subject, 'authorRepository', $authorRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('authors', $allAuthors);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenAuthorToView()
    {
        $author = new \Readinglist\Readinglist\Domain\Model\Author();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('author', $author);

        $this->subject->showAction($author);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenAuthorToAuthorRepository()
    {
        $author = new \Readinglist\Readinglist\Domain\Model\Author();

        $authorRepository = $this->getMockBuilder(\::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $authorRepository->expects(self::once())->method('add')->with($author);
        $this->inject($this->subject, 'authorRepository', $authorRepository);

        $this->subject->createAction($author);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenAuthorToView()
    {
        $author = new \Readinglist\Readinglist\Domain\Model\Author();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('author', $author);

        $this->subject->editAction($author);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenAuthorInAuthorRepository()
    {
        $author = new \Readinglist\Readinglist\Domain\Model\Author();

        $authorRepository = $this->getMockBuilder(\::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $authorRepository->expects(self::once())->method('update')->with($author);
        $this->inject($this->subject, 'authorRepository', $authorRepository);

        $this->subject->updateAction($author);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenAuthorFromAuthorRepository()
    {
        $author = new \Readinglist\Readinglist\Domain\Model\Author();

        $authorRepository = $this->getMockBuilder(\::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $authorRepository->expects(self::once())->method('remove')->with($author);
        $this->inject($this->subject, 'authorRepository', $authorRepository);

        $this->subject->deleteAction($author);
    }
}
