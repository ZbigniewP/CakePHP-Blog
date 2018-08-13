<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SymfonyCommentFixture
 *
 */
class SymfonyCommentFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'symfony_demo_comment';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'post_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'author_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'content' => ['type' => 'binary', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null],
        'publishedAt' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null],
        'status' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        '_indexes' => [
            'IDX_53AD8F834B89032C' => ['type' => 'index', 'columns' => ['post_id'], 'length' => []],
            'IDX_53AD8F83F675F31B' => ['type' => 'index', 'columns' => ['author_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'author_id_fk' => ['type' => 'foreign', 'columns' => ['author_id'], 'references' => ['symfony_user', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'post_id_fk' => ['type' => 'foreign', 'columns' => ['post_id'], 'references' => ['symfony_demo_post', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'id' => 1,
                'post_id' => 1,
                'author_id' => 1,
                'content' => 'Lorem ipsum dolor sit amet',
                'publishedAt' => '2018-08-07 16:30:22',
                'status' => 1
            ],
        ];
        parent::init();
    }
}
