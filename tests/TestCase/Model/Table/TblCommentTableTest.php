<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblCommentTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblCommentTable Test Case
 */
class TblCommentTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TblCommentTable
     */
    public $TblComment;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tbl_comment',
        'app.tbl_post'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TblComment') ? [] : ['className' => TblCommentTable::class];
        $this->TblComment = TableRegistry::getTableLocator()->get('TblComment', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TblComment);

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
