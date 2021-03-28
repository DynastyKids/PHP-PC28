<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Btc Entity
 *
 * @property int $id
 * @property int|null $time
 * @property string|null $result
 * @property int|null $pred_size
 * @property int|null $pred_odd
 */
class Btc extends Entity
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
        'time' => true,
        'result' => true,
        'pred_size' => true,
        'pred_odd' => true,
    ];
}
