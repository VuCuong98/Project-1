<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Subjects Model
 *
 * @property \App\Model\Table\TeachersTable|\Cake\ORM\Association\BelongsToMany $Teachers
 *
 * @method \App\Model\Entity\Subject get($primaryKey, $options = [])
 * @method \App\Model\Entity\Subject newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Subject[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Subject|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Subject|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Subject patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Subject[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Subject findOrCreate($search, callable $callback = null, $options = [])
 */
class SubjectsTable extends Table
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

        $this->setTable('subjects');
        $this->setDisplayField('subjectName');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Teachers', [ // quan hệ nhiều nhiều.
        // 1 giáo viên cũng thể dạy được nhiều môn và 1 môn cũng được dạy bởi nhiều giáo viên 
        // liên kết thông qua bảng subject_teacher    
            'foreignKey' => 'subject_id',
            'targetForeignKey' => 'teacher_id',
            'joinTable' => 'subjects_teachers'
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
            ->scalar('subject_code')
            ->maxLength('subject_code', 150)
            ->requirePresence('subject_code', 'create')
            ->notEmpty('subject_code');

        $validator
            ->scalar('subjectName')
            ->maxLength('subjectName', 150)
            ->requirePresence('subjectName', 'create')
            ->notEmpty('subjectName');

        return $validator;
    }
}
?>