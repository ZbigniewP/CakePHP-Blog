<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SymfonyUser Model
 *
 * @method \App\Model\Entity\SymfonyUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\SymfonyUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SymfonyUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SymfonyUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SymfonyUser|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SymfonyUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SymfonyUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SymfonyUser findOrCreate($search, callable $callback = null, $options = [])
 */
class SymfonyUserTable extends Table
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
		
		$this->setTable('symfony_demo_user');
		// $this->setDisplayField('id');
		$this->setDisplayField('fullName');
		$this->setPrimaryKey('id');

		$this->hasMany('SymfonyPost', ['foreignKey' => 'author_id']);
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
			->scalar('fullName')
			->maxLength('fullName', 255)
			->requirePresence('fullName', 'create')
			->notEmpty('fullName');

		$validator
			->scalar('username')
			->maxLength('username', 255)
			->requirePresence('username', 'create')
			->notEmpty('username')
			->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

		$validator
			->email('email')
			->requirePresence('email', 'create')
			->notEmpty('email')
			->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

		$validator
			->scalar('password')
			->maxLength('password', 255)
			->requirePresence('password', 'create')
			->notEmpty('password');

		$validator
			->requirePresence('roles', 'create')
			->notEmpty('roles');

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
		$rules->add($rules->isUnique(['username']));
		$rules->add($rules->isUnique(['email']));

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
