<?php

namespace App\Form;

use Cake\Form\Form;
use Cake\Validation\Validator;

class CreditCardForm extends Form
{
  protected function _buildValidator(Validator $validator)
  {
    $validator->setProvider('Custom', 'App\Model\Validation\CustomValidation');

    $validator
      ->add('security_code', 'blank', [
        'provider' => 'customValidate',
        'rule' => 'blank',
        'message' => '空白になっています',
      ])
      ->add('security_code', 'halfSizeNumber', [
        'provider' => 'customValidate',
        'rule' => 'halfSizeNumber',
        'message' => '半角数字以外の文字が使われています',
      ]);

    $validator
      ->add('privacy_policy', 'blank', [
        'provider' => 'customValidate',
        'rule' => 'blank',
        'message' => '利用規約に同意しなければ、登録することはできません',
      ]);
    return $validator;
  }
}
