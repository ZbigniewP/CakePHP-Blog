<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SymfonyUserTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SymfonyUserTable Test Case
 */
class UserTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SymfonyUserTable
     */
    public $User;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = ['app.symfony_user'];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('User') ? [] : ['className' => UserTable::class];
        $this->User = TableRegistry::getTableLocator()->get('User', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->User);

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
