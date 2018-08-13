<?php
namespace App\Model\Table\Symfony;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SymfonyPostTag Model
 *
 * @property \App\Model\Table\SymfonyPostTable|\Cake\ORM\Association\BelongsTo $SymfonyPost
 * @property \App\Model\Table\SymfonyTagsTable|\Cake\ORM\Association\BelongsTo $dataTags
 *
 * @method \App\Model\Entity\SymfonyPostTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\SymfonyPostTag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SymfonyPostTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SymfonyPostTag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SymfonyPostTag|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SymfonyPostTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SymfonyPostTag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SymfonyPostTag findOrCreate($search, callable $callback = null, $options = [])
 */
class SymfonyPostTagTable extends Table
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

        $this->belongsTo('SymfonyPost', [
            'foreignKey' => 'post_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SymfonyTags', [
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
        $rules->add($rules->existsIn(['post_id'], 'SymfonyPost'));
        $rules->add($rules->existsIn(['tag_id'], 'SymfonyTags'));

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
