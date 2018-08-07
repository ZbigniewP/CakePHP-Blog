<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SymfonyDemoPostTag Model
 *
 * @property \App\Model\Table\SymfonyDemoPostTable|\Cake\ORM\Association\BelongsTo $SymfonyDemoPost
 * @property \App\Model\Table\SymfonyDemoTagTable|\Cake\ORM\Association\BelongsTo $SymfonyDemoTag
 *
 * @method \App\Model\Entity\SymfonyDemoPostTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\SymfonyDemoPostTag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SymfonyDemoPostTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SymfonyDemoPostTag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SymfonyDemoPostTag|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SymfonyDemoPostTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SymfonyDemoPostTag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SymfonyDemoPostTag findOrCreate($search, callable $callback = null, $options = [])
 */
class SymfonyDemoPostTagTable extends Table
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

        $this->setTable('symfony_demo_post_tag');
        $this->setDisplayField('post_id');
        $this->setPrimaryKey(['post_id', 'tag_id']);

        $this->belongsTo('SymfonyDemoPost', [
            'foreignKey' => 'post_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SymfonyDemoTag', [
            'foreignKey' => 'tag_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['post_id'], 'SymfonyDemoPost'));
        $rules->add($rules->existsIn(['tag_id'], 'SymfonyDemoTag'));

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
