<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CreditCards Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\CreditCard get($primaryKey, $options = [])
 * @method \App\Model\Entity\CreditCard newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CreditCard[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CreditCard|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CreditCard saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CreditCard patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CreditCard[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CreditCard findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CreditCardsTable extends Table
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

        $this->setTable('credit_cards');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
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
        $validator->setProvider('Custom', 'App\Model\Validation\CustomValidation');

        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('number')
            ->maxLength('number', 16)
            ->requirePresence('number', 'create')
            ->notEmptyString('number', '空白になっています')
            ->add('number', 'halfSizeNumber', ['rule' => 'halfSizeNumber', 'provider' => 'Custom', 'message' => '半角数字以外の文字が使われています'])
            ->creditCard('number', 'all', '不正なカード番号です');

        $validator
            ->scalar('holder_name')
            ->maxLength('holder_name', 255)
            ->requirePresence('holder_name', 'create')
            ->notEmptyString('holder_name', '空白になっています')
            ->add('holder_name', 'halfSizeEnglish', ['rule' => 'halfSizeEnglish', 'provider' => 'Custom', 'message' => '半角英字以外の文字が使われています']);


        $validator
            ->requirePresence('expire_on', 'create')
            ->notEmptyDate('expire_on', '空白になっています')
            ->add('expire_on', 'expireOn', ['rule' => 'expireOn', 'provider' => 'Custom', 'message' => '半角数字以外の文字が使われています']);


        $validator
            ->boolean('is_deleted')
            ->notEmptyString('is_deleted');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
