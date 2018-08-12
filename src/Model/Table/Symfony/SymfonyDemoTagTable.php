<?php
namespace App\Model\Table\Symfony;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SymfonyDemoTag Model
 *
 * @method \App\Model\Entity\SymfonyDemoTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\SymfonyDemoTag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SymfonyDemoTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SymfonyDemoTag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SymfonyDemoTag|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SymfonyDemoTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SymfonyDemoTag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SymfonyDemoTag findOrCreate($search, callable $callback = null, $options = [])
 */
class SymfonyDemoTagTable extends Table
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

        $this->setTable('symfony_demo_tag');
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
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('frequency')
            ->allowEmpty('frequency');

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
        $rules->add($rules->isUnique(['name']));

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
