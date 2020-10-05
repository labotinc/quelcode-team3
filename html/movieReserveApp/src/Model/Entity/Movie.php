<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Movie Entity
 *
 * @property int $id
 * @property string $title
 * @property \Cake\I18n\FrozenTime $screen_time
 * @property \Cake\I18n\FrozenDate $last_screened_on
 * @property string $thumbnail_file_name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Schedule[] $schedules
 */
class Movie extends Entity
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
        'title' => true,
        'screen_time' => true,
        'last_screened_on' => true,
        'thumbnail_file_name' => true,
        'created' => true,
        'modified' => true,
        'schedules' => true,
    ];
}
