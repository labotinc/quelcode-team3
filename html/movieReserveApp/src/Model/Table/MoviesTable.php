<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Movies Model
 *
 * @property \App\Model\Table\SchedulesTable&\Cake\ORM\Association\HasMany $Schedules
 *
 * @method \App\Model\Entity\Movie get($primaryKey, $options = [])
 * @method \App\Model\Entity\Movie newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Movie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Movie|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Movie saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Movie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Movie[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Movie findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MoviesTable extends Table
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

        $this->setTable('movies');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Schedules', [
            'foreignKey' => 'movie_id',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 100)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->time('screen_time')
            ->requirePresence('screen_time', 'create')
            ->notEmptyTime('screen_time');

        $validator
            ->date('last_screened_on')
            ->requirePresence('last_screened_on', 'create')
            ->notEmptyDate('last_screened_on');

        $validator
            ->scalar('thumbnail_file_name')
            ->maxLength('thumbnail_file_name', 255)
            ->requirePresence('thumbnail_file_name', 'create')
            ->notEmptyFile('thumbnail_file_name');

        return $validator;
    }
}
