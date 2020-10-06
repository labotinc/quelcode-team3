<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RegularPrice Entity
 *
 * @property int $id
 * @property string $customer_type
 * @property int $price
 * @property bool $is_invalid
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Reservation[] $reservations
 */
class RegularPrice extends Entity
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
        'customer_type' => true,
        'price' => true,
        'is_invalid' => true,
        'created' => true,
        'modified' => true,
        'reservations' => true,
    ];
}
