<?php
namespace App\Model\Table;

use Cake\ORM\Query;
// use Cake\ORM\RulesChecker;
// use Cake\ORM\Table;
// use Cake\Validation\Validator;
use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Association\HasMany;
use Cake\ORM\Behavior\CounterCacheBehavior;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;
/**
 * Symfony\Post Model
 *
 * @property \App\Model\Table\SymfonyUserTable|\Cake\ORM\Association\BelongsTo $author
 *
 * @method \App\Model\Entity\SymfonyPost get($primaryKey, $options = [])
 * @method \App\Model\Entity\SymfonyPost newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SymfonyPost[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SymfonyPost|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SymfonyPost|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SymfonyPost patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SymfonyPost[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SymfonyPost findOrCreate($search, callable $callback = null, $options = [])
 */
class SymfonyPostTable extends Table
{

	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config)
	{
		parent::initialize($config);

		$this->setTable('symfony_demo_post');
		$this->setDisplayField('title');
		$this->setPrimaryKey('id');

		$this->belongsTo('author', ['className' => 'App\Model\Table\SymfonyUserTable',
			'foreignKey' => 'author_id',
			'joinType' => 'INNER'
		]);
		$this->belongsTo('statusType', ['className' => 'App\Model\Table\TblLookupTable',
			'key' => 'code',
			'foreignKey' => 'status',
			'where' => ['type' => 'PostStatus']
		]);
		$this->hasMany('comments', ['className' => 'App\Model\Table\SymfonyCommentTable',
			'foreignKey' => 'post_id',
			'joinType' => 'INNER'
		]);
		$this->hasMany('tags', ['className' => 'App\Model\Table\SymfonyPostsTagTable',
			'foreignKey' => 'post_id',
			'joinType' => 'INNER'
		]);
	}

	/**
	 * Default validation rules.
	 *
	 * @param \Cake\Validation\Validator $validator Validator instance.
	 * @return \Cake\Validation\Validator
	 */
	public function validationDefault(Validator $validator)
	{
		$validator
			->integer('id')
			->allowEmpty('id', 'create');

		$validator
			->scalar('title')
			->requirePresence('title', 'create')
			->notEmpty('title');

		$validator
			->scalar('slug')
			->requirePresence('slug', 'create')
			->notEmpty('slug');

		$validator
			->scalar('summary')
			->requirePresence('summary', 'create')
			->notEmpty('summary');

		$validator
			->requirePresence('content', 'create')
			->notEmpty('content');

		$validator
			->dateTime('publishedAt')
			->requirePresence('publishedAt', 'create')
			->notEmpty('publishedAt');

		$validator
			->integer('status')
			->allowEmpty('status');

		$validator
			->dateTime('updatedAt')
			->allowEmpty('updatedAt');

		return $validator;
	}

	/**
	 * Returns a rules checker object that will be used for validating
	 * application integrity.
	 *
	 * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
	 * @return \Cake\ORM\RulesChecker
	 */
	public function buildRules(RulesChecker $rules)
	{
		$rules->add($rules->existsIn(['author_id'], 'author'));

		return $rules;
	}

	/**
	 * Returns the database connection name to use by default.
	 *
	 * @return string
	 */
	public static function defaultConnectionName()
	{
		return 'db_symfony';
	}
}
