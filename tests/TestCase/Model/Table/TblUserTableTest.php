<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\YiiUserTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\YiiUserTable Test Case
 */
class TblUserTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\YiiUserTable
     */
    public $dataUser;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tbl_user'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TblUser') ? [] : ['className' => TblUserTable::class];
        $this->TblUser = TableRegistry::getTableLocator()->get('TblUser', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TblUser);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
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
