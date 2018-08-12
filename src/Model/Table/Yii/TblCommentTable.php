<?php
namespace App\Model\Table\Yii;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TblComment Model
 *
 * @property \App\Model\Table\TblPostTable|\Cake\ORM\Association\BelongsTo $TblPost
 *
 * @method \App\Model\Entity\Yii\Comment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Yii\Comment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Yii\Comment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Yii\Comment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Yii\Comment|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Yii\Comment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Yii\Comment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Yii\Comment findOrCreate($search, callable $callback = null, $options = [])
 */
class TblCommentTable extends Table
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

        $this->setTable('tbl_comment');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TblPost', [
            'foreignKey' => 'post_id',
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
            ->integer('type')
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->scalar('content')
            ->requirePresence('content', 'create')
            ->notEmpty('content');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->integer('create_time')
            ->allowEmpty('create_time');

        $validator
            ->scalar('author')
            ->requirePresence('author', 'create')
            ->notEmpty('author');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('url')
            ->allowEmpty('url');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['post_id'], 'TblPost'));

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
