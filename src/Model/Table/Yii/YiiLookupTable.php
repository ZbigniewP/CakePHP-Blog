<?php
namespace App\Model\Table\Yii;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * YiiLookup Model
 *
 * @method \App\Model\Entity\YiiLookup get($primaryKey, $options = [])
 * @method \App\Model\Entity\YiiLookup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\YiiLookup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\YiiLookup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\YiiLookup|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\YiiLookup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\YiiLookup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\YiiLookup findOrCreate($search, callable $callback = null, $options = [])
 */
class YiiLookupTable extends Table
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

		$this->setTable('tbl_lookup');
		$this->setDisplayField('name');
		$this->setPrimaryKey('id');
	}

	/**
	 * Default validation rules.
	 *
	 * @param \Cake\Validation\Validator $validator Validator instance.
	 * @return \Cake\Validation\Validator
	 */
	public function validationDefault(Validator $validator)
	{
		// $validator
		// 	->integer('id')
		// 	->allowEmpty('id', 'create');

		// $validator
		// 	->integer('position')
		// 	->requirePresence('position', 'create')
		// 	->notEmpty('position');

		// $validator
		// 	// ->scalar('code')
		// 	->requirePresence('code', 'create')
		// 	->notEmpty('code');

		// $validator
		// 	// ->scalar('name')
		// 	->requirePresence('name', 'create')
		// 	->notEmpty('name');

		// $validator
		// 	// ->scalar('type')
		// 	->requirePresence('type', 'create')
		// 	->notEmpty('type');

		return $validator;
	}

	/**
	 * Returns the database connection name to use by default.
	 *
	 * @return string
	 */
	public static function defaultConnectionName() { return 'db_yii'; }
}
