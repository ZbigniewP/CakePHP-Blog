<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Post Model
 *
 * @property \App\Model\Table\YiiPostTable|\Cake\ORM\Association\BelongsTo $YiiPost
 * @property \App\Model\Table\YiiUserTable|\Cake\ORM\Association\BelongsTo $YiiUser
 *
 * @method \App\Model\Entity\YiiPost get($primaryKey, $options = [])
 * @method \App\Model\Entity\YiiPost newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\YiiPost[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\YiiPost|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\YiiPost|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\YiiPost patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\YiiPost[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\YiiPost findOrCreate($search, callable $callback = null, $options = [])
 */
class YiiPostTable extends Table
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
		$this->addBehavior('CounterCache', ['YiiTag' => ['frequency']]);

		$this->belongsTo('YiiUser', [
			'foreignKey' => 'author_id',
			'joinType' => 'INNER'
		]);

		$this->hasMany('YiiComment', [
			'foreignKey' => 'post_id',
			'joinType' => 'INNER'
		]);

		$this->hasMany('YiiTag', [//'tags'
			'foreignKey' => 'name',
		]);
// ,['groupField'=>'type','keyField'=>'type','valueField'=>'PostStatus']
// 'params' => ['YiiLookup.type'=>'PostStatus']
// ->where(['YiiLookup.type' =>'PostStatus']),['conditions' => ['type=' => 'PostStatus']]
// echo'<pre>';print_r([$options,$query]);exit;
		$this->belongsTo('YiiLookup', [
			'foreignKey' => 'status',
			'conditions' => ['type' => 'PostStatus']
		]);

		// $this->belongsTo('Articles', [
		//     'foreignKey' => 'page_id'
		// ]);

		// $this->belongsTo('YiiUser', [
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
		// $rules->add($rules->existsIn(['page_id'], 'Articles'));
		$rules->add($rules->existsIn(['author_id'], 'YiiUser'));

		return $rules;
	}

	/**
	 * Returns the database connection name to use by default.
	 *
	 * @return string
	 */
	public static function defaultConnectionName() { return 'db_yii'; }
}