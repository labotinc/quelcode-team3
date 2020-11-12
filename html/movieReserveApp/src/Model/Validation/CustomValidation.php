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
   * 有効期限
   * @param string $value
   * @return bool
   */
  public static function expireOn($value)
  {
    if (preg_match('/^[0-9]{2}\/[0-9]{2}$/', $value)) {
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
    if (preg_match('/^[a-zA-Z]+[\s][a-zA-Z]+$/', $value)) {
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
  public static function blank($value)
  {
    if ($value) {
      return true;
    } else {
      return false;
    }
  }
}
