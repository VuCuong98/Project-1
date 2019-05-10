<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Teacher Entity
 *
 * @property string $teacher_id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $birthDay
 * @property int $phone
 * @property string $email
 * @property string $address
 * @property string $major
 * @property string $image
 * @property \Cake\I18n\FrozenTime $startDay
 * @property string $teacherDescription
 *
 * @property \App\Model\Entity\Subject[] $subjects
 */
class Teacher extends Entity
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
    	'teacher_code' => true,
        'name' => true,
        'birthDay' => true,
        'phone' => true,
        'email' => true,
        'address' => true,
        'major' => true,
        'image' => true,
        'startDay' => true,
        'teacherDescription' => true,
        'subjects' => true
    ];
}
