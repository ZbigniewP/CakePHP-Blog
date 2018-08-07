<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SymfonyDemoPostTagFixture
 *
 */
class SymfonyDemoPostTagFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'symfony_demo_post_tag';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'post_id' => ['autoIncrement' => null, 'type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null],
        'tag_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        '_indexes' => [
            'IDX_6ABC1CC4BAD26311' => ['type' => 'index', 'columns' => ['tag_id'], 'length' => []],
            'IDX_6ABC1CC44B89032C' => ['type' => 'index', 'columns' => ['post_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['post_id', 'tag_id'], 'length' => []],
            'sqlite_autoindex_symfony_demo_post_tag_1' => ['type' => 'unique', 'columns' => ['post_id', 'tag_id'], 'length' => []],
            'tag_id_fk' => ['type' => 'foreign', 'columns' => ['tag_id'], 'references' => ['symfony_demo_tag', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'post_id_fk' => ['type' => 'foreign', 'columns' => ['post_id'], 'references' => ['symfony_demo_post', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'post_id' => 1,
                'tag_id' => 1
            ],
        ];
        parent::init();
    }
}
