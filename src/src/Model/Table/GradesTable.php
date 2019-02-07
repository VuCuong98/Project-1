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
class GradesTable extends Table
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

        $this->setTable('Grades');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id'); // khóa chính là id 

        $this->belongsTo('Teachers') // một giáo viên thì sẽ nhập nhiều điểm 
        	 ->setForeignKey('teacher_id')	// dựa vào trường teacher_id để liên kết với bảng teacher
        	 ->setJoinType('INNER');

        $this->belongsTo('Students') // một học sinh có thể có nhiều điểm    
        	 ->setForeignKey('student_id')	// dựa vào trường student_id để liên kết với bảng student
        	 ->setJoinType('INNER');	

        $this->belongsTo('Subjects') // một môn học có thể có nhiều điểm 
        	 ->setForeignKey('subject_id')	// dựa vào trường subject_id để liên kết với bảng subject
        	 ->setJoinType('INNER');	 
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
            // trong form tạo thì có thể để trống id. id sẽ tự tăng 

        $validator
            ->scalar('middle_test') 
            ->maxLength('middle_test', 50) // độ dài tối đa cho middle_test là 50
            ->requirePresence('middle_test', 'create') 
            ->notEmpty('middle_test'); // ko cho phép để trống thì tạo điểm. Tương tự đối với final_test 
        $validator
            ->scalar('final_test')
            ->maxLength('final_test', 50)
            ->requirePresence('final_test', 'create')
            ->notEmpty('final_test');

        return $validator;
    }
}
?>
