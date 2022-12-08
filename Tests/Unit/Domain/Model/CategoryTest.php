<?php
namespace Readinglist\Readinglist\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Wim Thomzik <wim@thomzik.de>
 */
class CategoryTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Readinglist\Readinglist\Domain\Model\Category
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Readinglist\Readinglist\Domain\Model\Category();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getCategoryNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCategoryName()
        );
    }

    /**
     * @test
     */
    public function setCategoryNameForStringSetsCategoryName()
    {
        $this->subject->setCategoryName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'categoryName',
            $this->subject
        );
    }
}
