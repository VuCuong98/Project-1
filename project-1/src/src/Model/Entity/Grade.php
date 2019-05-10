<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Subject Entity
 *
 * @property int $id
 * @property string $subject_code
 * @property string $subjectName
 *
 * @property \App\Model\Entity\Teacher[] $teachers
 */
class Grade extends Entity
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
        'subject_id' => true,
        'student_id' => true,
        'teacher_id' => true,
        'middle_test'  => true,
        'final_test'   => true
        
    ];
}