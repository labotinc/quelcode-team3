<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservation Entity
 *
 * @property int $id
 * @property int $schedule_id
 * @property int $user_id
 * @property int $regular_price_id
 * @property int $discount_id
 * @property string $seat_number
 * @property int $purchased_price
 * @property bool $is_confirmed
 * @property \Cake\I18n\FrozenTime $expire_at
 * @property bool $is_cancelled
 * @property bool $is_deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Schedule $schedule
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\RegularPrice $regular_price
 * @property \App\Model\Entity\Discount $discount
 */
class Reservation extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'schedule_id' => true,
        'user_id' => true,
        'regular_price_id' => true,
        'discount_id' => true,
        'seat_number' => true,
        'purchased_price' => true,
        'is_confirmed' => true,
        'expire_at' => true,
        'is_cancelled' => true,
        'is_deleted' => true,
        'created' => true,
        'modified' => true,
        'schedule' => true,
        'user' => true,
        'regular_price' => true,
        'discount' => true,
    ];
}
