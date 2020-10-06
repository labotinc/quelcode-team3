<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RegularPrices Model
 *
 * @property \App\Model\Table\ReservationsTable&\Cake\ORM\Association\HasMany $Reservations
 *
 * @method \App\Model\Entity\RegularPrice get($primaryKey, $options = [])
 * @method \App\Model\Entity\RegularPrice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RegularPrice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RegularPrice|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RegularPrice saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RegularPrice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RegularPrice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RegularPrice findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RegularPricesTable extends Table
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

        $this->setTable('regular_prices');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Reservations', [
            'foreignKey' => 'regular_price_id',
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
            ->scalar('customer_type')
            ->maxLength('customer_type', 255)
            ->requirePresence('customer_type', 'create')
            ->notEmptyString('customer_type');

        $validator
            ->integer('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->boolean('is_invalid')
            ->requirePresence('is_invalid', 'create')
            ->notEmptyString('is_invalid');

        return $validator;
    }
}
