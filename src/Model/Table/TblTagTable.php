<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TblTag Model
 *
 * @method \App\Model\Entity\TblTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\TblTag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TblTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TblTag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TblTag|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TblTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TblTag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TblTag findOrCreate($search, callable $callback = null, $options = [])
 */
class TblTagTable extends Table
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
            ->scalar('name')
            ->maxLength('name', 128)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('frequency')
            ->allowEmpty('frequency');

        return $validator;
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
