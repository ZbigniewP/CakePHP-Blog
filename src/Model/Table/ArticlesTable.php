<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
// the Text class
use Cake\Utility\Text;
// add this use statement right below the namespace declaration to import
// the Validator class
use Cake\Validation\Validator;

class ArticlesTable extends Table
{

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName() { return 'default'; }
// public static function defaultConnectionName()
// {
//     return 'db_cake';
// // Cake\ORM\Locator\TableLocator\getConfig('Comments');
// // exit();
// // print_r($comment);
// // print_r($this->Posts->Comments->getConnection());
// // print_r($this->PostsTable::get('Comments'));
// // print_r($this->request->getData());
// // public function Cake\ORM\Locator\TableLocator\get('Comments', ['connection'=>'db_cake'])
// // public function Cake\ORM\Locator\TableLocator\setConfig('Comments', ['connection'=>'db_cake'])
// $this->_connection = 'db_cake';
// $this->Posts->Comments->setConnection('db_cake');
// $this->setConnection('db_cake');
// $this->setConnection('db_cake');
// $this->TableLocator->get('Comments', ['connection'=>'db_cake']);
// $this->TableLocator->get('Comments', ['connection'=>'db_cake']);
// $this->TableLocator->setConfig('Comments', ['connection'=>'db_cake']);
// $this->TableLocator->setConfig('Comments', ['connection'=>'db_cake']);
// echo __NAMESPACE__;
//TableRegistry::config('Users', ['table' => 'my_users']);
// exit($this->getConnection());
// print_r([$options,get_called_class()]); 
// print_r($this->Posts->Comments);
// protected $_connection = 'db_cake';
// public $connection = 'default';
// public $connectionName ='db_cake';
// TableRegistry::get('Atricles');
// use Cake\ORM\Locator\TableLocator;
// use Cake\ORM\TableRegistry;
//'connectionName'=>'db_cake',
//['connectionName' =>'db_cake']
// }

	public function initialize(array $config)
    {
		parent::initialize($config);

        $this->setTable('articles');
        $this->setDisplayField('name');
		$this->setPrimaryKey('id');
		
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created_at' => 'new',
                    'modified_at' => 'always'
                ]
            ]
        ]);
		// $this->hasMany('Comments')
		// 	->setConditions(['approved' => true]);

		// $this->hasMany('UnapprovedComments', ['className' => 'Comments'])
		// 	->setConditions(['approved' => false])
		// 	->setProperty('unapproved_comments');

		// $this->belongsTo('Authors', ['className' => 'Publishing.Authors'])
		// 	->setForeignKey('authorid')
		// 	->setProperty('person');
		// $this->belongsTo('Authors', ['className' => 'Publishing.Authors',
		// 	'foreignKey' => 'authorid',
		// 	'propertyName' => 'person'
		// ]);

		// Within ArticlesTable::initialize() call
		// $this->hasMany('Reviews')
		// 	->setForeignKey(['article_id','article_hash'])
		// 	->setBindingKey(['whatever_id','whatever_hash']);
	}
	// public function setUp()
	// {
	//     parent::setUp();
	//     $config = TableRegistry::getTableLocator()->exists('cms_cake') ? [] : ['cms_cake' => ArticlesTable::class];
	//     $this->Sessions = TableRegistry::getTableLocator()->get('cms_cake', $config);
	// }
	
	// Add the following method.
	public function beforeSave($event, $entity, $options)
	{
		if ($entity->isNew() && !$entity->slug) {
			$sluggedTitle = Text::slug($entity->title);
			// trim slug to maximum length defined in schema
			$entity->slug = substr($sluggedTitle, 0, 191);
		}
	}
	// Add the following method.
	public function validationDefault(Validator $validator)
	{
		$validator
		->notEmpty('title')
		->minLength('title', 10)
		->maxLength('title', 255)
		->notEmpty('body')
		->minLength('body', 10);
		
		return $validator;
	}
}
