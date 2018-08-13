<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\Symfony\PostTagTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\Symfony\PostTagTable Test Case
 */
class SymfonyPostsTagTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\Symfony\PostTagTable
     */
    public $SymfonyPostsTag;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.symfony_demo_post_tag',
        'app.symfony_demo_post',
        'app.symfony_demo_tag'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SymfonyPostsTag') ? [] : ['className' => SymfonyPostsTagTable::class];
        $this->SymfonyPostsTag = TableRegistry::getTableLocator()->get('SymfonyPostsTag', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SymfonyPostsTag);

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
