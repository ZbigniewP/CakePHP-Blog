<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SymfonyComment Model
 *
 * @property \App\Model\Table\SymfonyPostTable|\Cake\ORM\Association\BelongsTo $post
 * @property \App\Model\Table\SymfonyUserTable|\Cake\ORM\Association\BelongsTo $user
 *
 * @method \App\Model\Entity\Symfony\Comment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Symfony\Comment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Symfony\Comment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Symfony\Comment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Symfony\Comment|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Symfony\Comment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Symfony\Comment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Symfony\Comment findOrCreate($search, callable $callback = null, $options = [])
 */
class SymfonyCommentTable extends Table
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

		$this->setTable('symfony_demo_comment');
		$this->setDisplayField('id');
		$this->setPrimaryKey('id');

		$this->belongsTo('post', ['className' => 'App\Model\Table\SymfonyPostTable',
			'foreignKey' => 'post_id',
			'joinType' => 'INNER'
		]);
		$this->belongsTo('user', ['className' => 'App\Model\Table\SymfonyUserTable',
			'foreignKey' => 'author_id',
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
			->requirePresence('content', 'create')
			->notEmpty('content');

		$validator
			->dateTime('publishedAt')
			->requirePresence('publishedAt', 'create')
			->notEmpty('publishedAt');

		$validator
			->integer('status')
			->allowEmpty('status');

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
		$rules->add($rules->existsIn(['post_id'], 'post'));
		$rules->add($rules->existsIn(['author_id'], 'user'));

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
