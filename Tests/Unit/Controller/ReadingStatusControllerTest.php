<?php
namespace Readinglist\Readinglist\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Wim Thomzik <wim@thomzik.de>
 */
class ReadingStatusControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Readinglist\Readinglist\Controller\ReadingStatusController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Readinglist\Readinglist\Controller\ReadingStatusController::class)
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
    public function listActionFetchesAllReadingStatusesFromRepositoryAndAssignsThemToView()
    {

        $allReadingStatuses = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $readingStatusRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $readingStatusRepository->expects(self::once())->method('findAll')->will(self::returnValue($allReadingStatuses));
        $this->inject($this->subject, 'readingStatusRepository', $readingStatusRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('readingStatuses', $allReadingStatuses);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenReadingStatusToView()
    {
        $readingStatus = new \Readinglist\Readinglist\Domain\Model\ReadingStatus();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('readingStatus', $readingStatus);

        $this->subject->showAction($readingStatus);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenReadingStatusToReadingStatusRepository()
    {
        $readingStatus = new \Readinglist\Readinglist\Domain\Model\ReadingStatus();

        $readingStatusRepository = $this->getMockBuilder(\::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $readingStatusRepository->expects(self::once())->method('add')->with($readingStatus);
        $this->inject($this->subject, 'readingStatusRepository', $readingStatusRepository);

        $this->subject->createAction($readingStatus);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenReadingStatusToView()
    {
        $readingStatus = new \Readinglist\Readinglist\Domain\Model\ReadingStatus();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('readingStatus', $readingStatus);

        $this->subject->editAction($readingStatus);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenReadingStatusInReadingStatusRepository()
    {
        $readingStatus = new \Readinglist\Readinglist\Domain\Model\ReadingStatus();

        $readingStatusRepository = $this->getMockBuilder(\::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $readingStatusRepository->expects(self::once())->method('update')->with($readingStatus);
        $this->inject($this->subject, 'readingStatusRepository', $readingStatusRepository);

        $this->subject->updateAction($readingStatus);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenReadingStatusFromReadingStatusRepository()
    {
        $readingStatus = new \Readinglist\Readinglist\Domain\Model\ReadingStatus();

        $readingStatusRepository = $this->getMockBuilder(\::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $readingStatusRepository->expects(self::once())->method('remove')->with($readingStatus);
        $this->inject($this->subject, 'readingStatusRepository', $readingStatusRepository);

        $this->subject->deleteAction($readingStatus);
    }
}
