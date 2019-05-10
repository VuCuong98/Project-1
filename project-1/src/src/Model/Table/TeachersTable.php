<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

class TeachersTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsToMany('Subjects',[       // một giáo viên có thể dạy được nhiều môn 
        	'joinTable' => 'subjects_teachers'	
        ]);
        $this->hasMany('Grades'); // một giáo viên cũng có thể nhập được nhiều điểm 

	}
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('teacher_code')
            ->maxLength('teacher_code', 50)
            ->requirePresence('teacher_code', 'create')
            ->notEmpty('teacher_code');

        $validator
            ->scalar('name')
            ->maxLength('name', 150)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->dateTime('birthDay')
            ->requirePresence('birthDay', 'create')
            ->notEmpty('birthDay');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 50)
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');

        $validator
            ->scalar('address')
            ->maxLength('address', 150)
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->scalar('major')
            ->maxLength('major', 150)
            ->requirePresence('major', 'create')
            ->notEmpty('major');

        $validator
            ->scalar('image')
            ->requirePresence('image', 'create')
            ->notEmpty('image');

        $validator
            ->dateTime('startDay')
            ->requirePresence('startDay', 'create')
            ->notEmpty('startDay');

        $validator
            ->scalar('teacherDescription')
            ->maxLength('teacherDescription', 150)
            ->requirePresence('teacherDescription', 'create')
            ->notEmpty('teacherDescription');


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email'])); // kiểm tra trùng email khi tạo mới teacher

        $rules->add($rules->isUnique(['teacher_code'])); // kiểm tra trùng teacher_code

        return $rules;
    }
}
?>