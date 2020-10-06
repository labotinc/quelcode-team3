<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegularPricesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegularPricesTable Test Case
 */
class RegularPricesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RegularPricesTable
     */
    public $RegularPrices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.RegularPrices',
        'app.Reservations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('RegularPrices') ? [] : ['className' => RegularPricesTable::class];
        $this->RegularPrices = TableRegistry::getTableLocator()->get('RegularPrices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RegularPrices);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
