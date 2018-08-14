<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * YiiTag Model
 *
 * @method \App\Model\Entity\YiiTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\YiiTag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\YiiTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\YiiTag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\YiiTag|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\YiiTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\YiiTag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\YiiTag findOrCreate($search, callable $callback = null, $options = [])
 */
class YiiTagTable extends Table
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

		$this->setTable('tbl_tag');
		$this->setDisplayField('name');
		$this->setPrimaryKey('id');

		// $this->hasMany('YiiPost', ['foreignKey' => 'tags']);
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
			// ->scalar('name')
			->maxLength('name', 128)
			->requirePresence('name', 'create')
			->notEmpty('name');

		// $validator
		// 	->integer('frequency')
		// 	->allowEmpty('frequency');
		// $validator
		// 	->integer('post_count')
		// 	->requirePresence('post_count', 'create')
		// 	->notEmpty('post_count');

		return $validator;
	}

	/**
	 * Returns the database connection name to use by default.
	 *
	 * @return string
	 */
	public static function defaultConnectionName() { return 'db_yii'; }
}
