<?php

namespace App\Model\Table;

use App\Model\Entity\Users;
use Cake\Datasource\EntityInterface;
use Cake\ORM\Association\HasMany;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property HasMany $Posts
 *
 * @method Users get($primaryKey, $options = [])
 * @method Users newEntity($data = null, array $options = [])
 * @method Users[] newEntities(array $data, array $options = [])
 * @method Users|bool save(EntityInterface $entity, $options = [])
 * @method Users patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Users[] patchEntities($entities, array $data, array $options = [])
 * @method Users findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
{
	public static function defaultConnectionName() { return 'db_cake'; }

	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config)
	{
		parent::initialize($config);

		$this->setTable('users');
		$this->setDisplayField('username');
		$this->setPrimaryKey('id');

		$this->hasMany('Posts', [
			'foreignKey' => 'user_id'
		]);
	}

	/**
	 * Default validation rules.
	 *
	 * @param Validator $validator Validator instance.
	 * @return Validator
	 */
	public function validationDefault(Validator $validator)
	{
		$validator
			->integer('id')
			->allowEmpty('id', 'create');

		$validator
			->requirePresence('username', 'create')
			->notEmpty('username');

		$validator
			->requirePresence('password', 'create')
			->notEmpty('password');

		return $validator;
	}

	/**
	 * Returns a rules checker object that will be used for validating
	 * application integrity.
	 *
	 * @param RulesChecker $rules The rules object to be modified.
	 * @return RulesChecker
	 */
	public function buildRules(RulesChecker $rules)
	{
		$rules->add($rules->isUnique(['username']));

		return $rules;
	}
}
