<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblPostTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblPostTable Test Case
 */
class TblPostTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TblPostTable
     */
    public $TblPost;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tbl_post',
        'app.pages',
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
        $config = TableRegistry::getTableLocator()->exists('TblPost') ? [] : ['className' => TblPostTable::class];
        $this->TblPost = TableRegistry::getTableLocator()->get('TblPost', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TblPost);

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
