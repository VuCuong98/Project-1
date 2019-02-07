<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Students Model
 *
 * @property \App\Model\Table\CertificatesTable|\Cake\ORM\Association\HasMany $Certificates
 * @property \App\Model\Table\GradesTable|\Cake\ORM\Association\HasMany $Grades
 *
 * @method \App\Model\Entity\Student get($primaryKey, $options = [])
 * @method \App\Model\Entity\Student newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Student[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Student|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Student|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Student patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Student[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Student findOrCreate($search, callable $callback = null, $options = [])
 */
class StudentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('students'); 
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasOne('Certificates'); // mỗi học sinh sẽ chỉ được cấp 1 bằng
        $this->hasMany('Grades', [      // mỗi học sinh sẽ có nhiều điểm 
            'foreignKey' => 'student_id'
        ]);

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('student_code')
            ->maxLength('student_code', 50)
            ->requirePresence('student_code', 'create')
            ->notEmpty('student_code');

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
            ->integer('year')
            ->requirePresence('year', 'create')
            ->notEmpty('year');

        $validator
            ->integer('parent_contact')
            ->requirePresence('parent_contact', 'create')
            ->notEmpty('parent_contact');

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
        $rules->add($rules->isUnique(['email'])); // kiểm tra email không được trùng
        $rules->add($rules->isUnique(['student_code']));  // kiểm tra mã số của sinh viên cũng không được trùng 

        return $rules;
    }
}
