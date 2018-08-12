<?php
namespace App\Model\Table\Yii;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * YiiPost Model
 *
 * @property \App\Model\Table\Yii\PostTable|\Cake\ORM\Association\BelongsTo $Post
 * @property \App\Model\Table\Yii\UserTable|\Cake\ORM\Association\BelongsTo $User
 *
 * @method \App\Model\Entity\Yii\Post get($primaryKey, $options = [])
 * @method \App\Model\Entity\Yii\Post newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Yii\Post[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Yii\Post|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Yii\Post|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Yii\Post patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Yii\Post[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Yii\Post findOrCreate($search, callable $callback = null, $options = [])
 */
class PostTable extends Table
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

		$this->setTable('tbl_post');
		$this->setDisplayField('title');
		$this->setPrimaryKey('id');

		$this->addBehavior('Timestamp');
		$this->addBehavior('CounterCache', ['Tag' => ['frequency']]);

		$this->belongsTo('User', [
			'foreignKey' => 'author_id',
			'joinType' => 'INNER'
		]);

		$this->hasMany('Comment', [
			'foreignKey' => 'post_id',
			'joinType' => 'INNER'
		]);

		$this->hasMany('Tag', [//'tags'
			'foreignKey' => 'name',
		]);
// ,['groupField'=>'type','keyField'=>'type','valueField'=>'PostStatus']
// 'params' => ['Lookup.type'=>'PostStatus']
// ->where(['Lookup.type' =>'PostStatus']),['conditions' => ['type=' => 'PostStatus']]
// echo'<pre>';print_r([$options,$query]);exit;
		$this->belongsTo('Lookup', [
			'foreignKey' => 'status',
			'conditions' => ['type' => 'PostStatus']
		]);

		// $this->belongsTo('Articles', [
		//     'foreignKey' => 'page_id'
		// ]);

		// $this->belongsTo('User', [
		// 	'foreignKey' => 'author_id',
		// 	'joinType' => 'INNER'
		// ]);
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
			// ->scalar('title')
			->requirePresence('title', 'create')
			->notEmpty('title');
// stream if BLOB
		$validator
			// ->scalar('content')
			->requirePresence('content', 'create')
			->notEmpty('content');

		// $validator
		// 	->scalar('tags')
		// 	->allowEmpty('tags');

		// $validator
		// 	->integer('status')
		//  ->range('status',[1,2,3]) ->inList('status',[1,2,3])
		// 	->requirePresence('status', 'create')
		// 	->notEmpty('status');

		$validator
			->dateTime('create_time')
			->allowEmpty('create_time');

		// $validator
		// 	->dateTime('update_time')
		// 	->allowEmpty('update_time');

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
		$rules->add($rules->existsIn(['page_id'], 'Post'));
		$rules->add($rules->existsIn(['author_id'], 'User'));

		return $rules;
	}

	/**
	 * Returns the database connection name to use by default.
	 *
	 * @return string
	 */
	public static function defaultConnectionName() { return 'db_yii'; }
}