<?php

namespace App\Model\Table;

use App\Model\Entity\Categories;
use Cake\Datasource\EntityInterface;
use Cake\ORM\Association\HasMany;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categories Model
 *
 * @property HasMany $Posts
 *
 * @method Categories get($primaryKey, $options = [])
 * @method Categories newEntity($data = null, array $options = [])
 * @method Categories[] newEntities(array $data, array $options = [])
 * @method Categories|bool save(EntityInterface $entity, $options = [])
 * @method Categories patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Categories[] patchEntities($entities, array $data, array $options = [])
 * @method Categories findOrCreate($search, callable $callback = null, $options = [])
 */
class CategoriesTable extends Table
{
	// protected $_connection = 'db_cake';
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

		$this->setTable('categories');
		$this->setDisplayField('name');
		$this->setPrimaryKey('id');

		$this->hasMany('Posts', ['foreignKey' => 'Categories_id']);
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
			->requirePresence('name', 'create')
			->notEmpty('name');

		$validator
			->requirePresence('slug', 'create')
			->notEmpty('slug');

		$validator
			->integer('post_count')
			->requirePresence('post_count', 'create')
			->notEmpty('post_count');

		return $validator;
	}
}
