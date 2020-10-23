<?php

namespace App\Model\Validation;

use Cake\Validation\Validation;

class CustomValidation extends Validation
{
  /**
   * 半角数字
   * @param string $value
   * @return bool
   */
  public static function halfSizeNumber($value)
  {
    if (preg_match('/^[\d]+$/', $value)) {
      return true;
    } else {
      return false;
    }
  }
  /**
   * 半角英字
   * @param string $value
   * @return bool
   */
  public static function halfSizeEnglish($value)
  {
    if (preg_match('/^[a-zA-Z]+$/', $value)) {
      return true;
    } else {
      return false;
    }
  }
}
