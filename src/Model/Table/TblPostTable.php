<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TblPost Model
 *
 * @property \App\Model\Table\ArticlesTable|\Cake\ORM\Association\BelongsTo $Articles
 * @property \App\Model\Table\TblUserTable|\Cake\ORM\Association\BelongsTo $dataUser
 *
 * @method \App\Model\Entity\TblPost get($primaryKey, $options = [])
 * @method \App\Model\Entity\TblPost newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TblPost[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TblPost|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TblPost|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TblPost patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TblPost[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TblPost findOrCreate($search, callable $callback = null, $options = [])
 */
class TblPostTable extends Table
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

		// $this->addBehavior('Timestamp');
		// $this->addBehavior('CounterCache', ['TblTag' => ['frequency']]);

		// $this->belongsTo('Articles', [
		// 	'foreignKey' => 'page_id'
		// ]);

		// $this->hasMany('TblComment', [
		// 	'foreignKey' => 'post_id',
		// ]);
		// $this->hasMany('TblComment', [
		// 	'foreignKey' => 'post_id',
		// 	'joinType' => 'INNER'
		// ]);

		// $this->hasMany('TblTag', [
		// 	'foreignKey' => 'name',
		// ]);

		// $this->belongsTo('TblUser', [
		// 	'foreignKey' => 'author_id',
		// 	'joinType' => 'INNER'
		// ]);
		$this->belongsTo('TblLookup', ['key' => 'status', 'foreignKey' => 'code', 'where' => 'PostStatus']);
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

		$validator
			// ->scalar('content')
			->requirePresence('content', 'create')
			->notEmpty('content');

		// $validator
		// 	->scalar('tags')
		// 	->allowEmpty('tags');

		// $validator
		// 	->integer('status')
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
		$rules->add($rules->existsIn(['author_id'], 'TblUser'));

		return $rules;
	}

	/**
	 * Returns the database connection name to use by default.
	 *
	 * @return string
	 */
	public static function defaultConnectionName()
	{
		return 'db_yii';
	}
}
