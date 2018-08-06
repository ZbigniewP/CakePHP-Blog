<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SessionsFixture
 *
 */
class SessionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'string', 'fixed' => true, 'length' => 40, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'precision' => null, 'comment' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'precision' => null, 'comment' => null],
        'data' => ['type' => 'binary', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'expires' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'sqlite_autoindex_sessions_1' => ['type' => 'unique', 'columns' => ['id'], 'length' => []],
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
                'id' => '60585fe5-7ca2-47d9-9d0b-10e2dcaf334c',
                'created' => '2018-07-13 22:12:46',
                'modified' => '2018-07-13 22:12:46',
                'data' => 'Lorem ipsum dolor sit amet',
                'expires' => 1
            ],
        ];
        parent::init();
    }
}
