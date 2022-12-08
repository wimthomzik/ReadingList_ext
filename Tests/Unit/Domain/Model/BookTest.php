<?php
namespace Readinglist\Readinglist\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Wim Thomzik <wim@thomzik.de>
 */
class BookTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Readinglist\Readinglist\Domain\Model\Book
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Readinglist\Readinglist\Domain\Model\Book();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getIsbnReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getIsbn()
        );
    }

    /**
     * @test
     */
    public function setIsbnForIntSetsIsbn()
    {
        $this->subject->setIsbn(12);

        self::assertAttributeEquals(
            12,
            'isbn',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCategoryReturnsInitialValueForCategory()
    {
        self::assertEquals(
            null,
            $this->subject->getCategory()
        );
    }

    /**
     * @test
     */
    public function setCategoryForCategorySetsCategory()
    {
        $categoryFixture = new \Readinglist\Readinglist\Domain\Model\Category();
        $this->subject->setCategory($categoryFixture);

        self::assertAttributeEquals(
            $categoryFixture,
            'category',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAuthorReturnsInitialValueForAuthor()
    {
        self::assertEquals(
            null,
            $this->subject->getAuthor()
        );
    }

    /**
     * @test
     */
    public function setAuthorForAuthorSetsAuthor()
    {
        $authorFixture = new \Readinglist\Readinglist\Domain\Model\Author();
        $this->subject->setAuthor($authorFixture);

        self::assertAttributeEquals(
            $authorFixture,
            'author',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStatusReturnsInitialValueForReadingStatus()
    {
        self::assertEquals(
            null,
            $this->subject->getStatus()
        );
    }

    /**
     * @test
     */
    public function setStatusForReadingStatusSetsStatus()
    {
        $statusFixture = new \Readinglist\Readinglist\Domain\Model\ReadingStatus();
        $this->subject->setStatus($statusFixture);

        self::assertAttributeEquals(
            $statusFixture,
            'status',
            $this->subject
        );
    }
}
