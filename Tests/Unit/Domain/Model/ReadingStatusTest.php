<?php
namespace Readinglist\Readinglist\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Wim Thomzik <wim@thomzik.de>
 */
class ReadingStatusTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Readinglist\Readinglist\Domain\Model\ReadingStatus
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Readinglist\Readinglist\Domain\Model\ReadingStatus();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getStatusReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getStatus()
        );
    }

    /**
     * @test
     */
    public function setStatusForBoolSetsStatus()
    {
        $this->subject->setStatus(true);

        self::assertAttributeEquals(
            true,
            'status',
            $this->subject
        );
    }
}
