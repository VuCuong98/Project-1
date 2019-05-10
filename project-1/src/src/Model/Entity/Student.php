<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Student Entity
 *
 * @property int $id
 * @property string $student_code
 * @property string $name
 * @property \Cake\I18n\FrozenTime $birthDay
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $major
 * @property string $image
 * @property int $year
 * @property int $parent_contact
 *
 * @property \App\Model\Entity\Certificate[] $certificates
 * @property \App\Model\Entity\Grade[] $grades
 */
class Student extends Entity
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
        'student_code' => true,
        'name' => true,
        'birthDay' => true,
        'email' => true,
        'phone' => true,
        'address' => true,
        'major' => true,
        'image' => true,
        'year' => true,
        'parent_contact' => true,
        'certificates' => true,
        'grades' => true
    ];
}
