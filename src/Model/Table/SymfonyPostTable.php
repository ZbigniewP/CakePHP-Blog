<?php
namespace App\Model\Table;

use Cake\ORM\Query;
// use Cake\ORM\RulesChecker;
// use Cake\ORM\Table;
// use Cake\Validation\Validator;
use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Association\HasMany;
use Cake\ORM\Behavior\CounterCacheBehavior;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;
/**
 * Symfony\Post Model
 *
 * @property \App\Model\Table\SymfonyUserTable|\Cake\ORM\Association\BelongsTo $SymfonyUser
 *
 * @method \App\Model\Entity\Symfony\Post get($primaryKey, $options = [])
 * @method \App\Model\Entity\Symfony\Post newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Symfony\Post[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Symfony\Post|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Symfony\Post|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Symfony\Post patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Symfony\Post[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Symfony\Post findOrCreate($search, callable $callback = null, $options = [])
 */
class SymfonyPostTable extends Table
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

        $this->setTable('symfony_demo_post');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('SymfonyUser', [
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
            ->scalar('slug')
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        $validator
            ->scalar('summary')
            ->requirePresence('summary', 'create')
            ->notEmpty('summary');

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

        $validator
            ->dateTime('updatedAt')
            ->allowEmpty('updatedAt');

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
        $rules->add($rules->existsIn(['author_id'], 'User'));

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
