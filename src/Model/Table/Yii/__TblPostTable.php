<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * YiiPost Model
 *
 * @property \App\Model\Table\Yii\PostTable|\Cake\ORM\Association\BelongsTo $Articles
 * @property \App\Model\Table\Yii\UsersTable|\Cake\ORM\Association\BelongsTo $YiiUsers
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

        // $this->belongsTo('Articles', [
        //     'foreignKey' => 'page_id'
        // ]);
        $this->belongsTo('YiiUsers', [
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
            ->scalar('title')
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('content')
            ->requirePresence('content', 'create')
            ->notEmpty('content');

        $validator
            ->scalar('tags')
            ->allowEmpty('tags');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->integer('create_time')
            ->allowEmpty('create_time');

        $validator
            ->integer('update_time')
            ->allowEmpty('update_time');

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
        $rules->add($rules->existsIn(['page_id'], 'Pages'));
        $rules->add($rules->existsIn(['author_id'], 'YiiUsers'));

        return $rules;
    }

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName() { return 'db_yii'; }
}
