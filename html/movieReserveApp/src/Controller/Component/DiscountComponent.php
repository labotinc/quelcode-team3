<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class DiscountComponent extends Component
{
  public function returnEventName($date)
  {
    $res = '';
    if ($date->format('j') === '1') {
      $res = 'ファーストデイ割引';
    } else if ($date->format('w') == '3') {
      $res = '子供女性シニア割引';
    }

    return $res;
  }
}
