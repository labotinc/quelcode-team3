<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\CreditCardsTable&\Cake\ORM\Association\HasMany $CreditCards
 * @property \App\Model\Table\ReservationsTable&\Cake\ORM\Association\HasMany $Reservations
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

      $this->setTable('users');
      $this->setDisplayField('id');
      $this->setPrimaryKey('id');

      $this->addBehavior('Timestamp');

      $this->hasMany('CreditCards', [
          'foreignKey' => 'user_id',
      ]);
      $this->hasMany('Reservations', [
          'foreignKey' => 'user_id',
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
          ->email('email', false, 'メールアドレスが間違っているようです')
          ->requirePresence('email', 'create')
          ->notEmptyString('email', '空白になっています');

      $validator
          ->scalar('password')
          ->lengthBetween('password', [4, 13], 'パスワードは4文字以上、13文字以内にしてください')
          ->ascii('password', 'パスワードに使えない文字が入力されています')
          ->requirePresence('password', 'create')
          ->notEmptyString('password', '空白になっています');

      $validator
          ->sameAs('password_check', 'password', 'パスワードが一致していません')
          ->notEmptyString('password_check', '空白になっています')
          ->ascii('password_check', 'パスワードに使えない文字が入力されています')
          ->lengthBetween('password_check', [4, 13], 'パスワードは4文字以上、13文字以内にしてください');

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
      $rules->add($rules->isUnique(['email'], 'メーアドレスは既に使用されています'));

      return $rules;
  }
}
