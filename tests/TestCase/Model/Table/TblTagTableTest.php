<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblTagTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblTagTable Test Case
 */
class TblTagTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TblTagTable
     */
    public $dataTag;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tbl_tag'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TblTag') ? [] : ['className' => TblTagTable::class];
        $this->TblTag = TableRegistry::getTableLocator()->get('TblTag', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TblTag);

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
