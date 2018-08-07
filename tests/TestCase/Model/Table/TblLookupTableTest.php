<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblLookupTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblLookupTable Test Case
 */
class TblLookupTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TblLookupTable
     */
    public $TblLookup;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tbl_lookup'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TblLookup') ? [] : ['className' => TblLookupTable::class];
        $this->TblLookup = TableRegistry::getTableLocator()->get('TblLookup', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TblLookup);

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

    /**
     * Test defaultConnectionName method
     *
     * @return void
     */
    public function testDefaultConnectionName()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
