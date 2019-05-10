<?php 

namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;

/**
 * summary
 */
class GradesController extends AppController
{
    /**
     * summary
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
    }

    public function index(){
        $studentList = $this->Grades->Students->find('list')->select(['id','name'])->toArray();
        $subjectList = $this->Grades->Subjects->find('list')->select(['id','subjectName'])->toArray();
    	$grades = TableRegistry::getTableLocator()->get('Grades');
    	// $grades = $this->paginate($this->Grades);
    	$query = $grades->find('all',['contain' => ['Teachers','Students','Subjects']
    								 ,'order'=> ['Students.name'=>'DESC']
    								])
    					->toArray();
    	$this->set('query',$query);
        $this->set(compact('studentList','subjectList'));
    }

    public function add(){
    	$grade = $this->Grades->newEntity();
    	if($this->request->is('post')){
    		 $data = $this->request->getData();
    		 debug($data);
    		$grade = $this->Grades->patchEntity($grade,$this->request->getData());
    		debug($grade);
    		if($this->Grades->save($grade)){
    			$this->Flash->success('Your grade has saved');
    			return $this->redirect(['action' => 'add']);

    		}
    		else{
    			$this->Flash->error('Your grade has not saved');
    		}
    	}
    	$teacherList = $this->Grades->Teachers->find('list')->select(['id','name'])->toArray();
    	$studentList = $this->Grades->Students->find('list')->select(['id','name'])->toArray();
    	$subjectList = $this->Grades->Subjects->find('list')->select(['id','subjectName'])->toArray();
    	$this->set(compact('grade','teacherList','studentList','subjectList'));
    	// $this->set('teacherList', $teacherList);
    }



    public function teacherView($id = null){
        // $teacherList = $this->Grades->Teachers->find('list')->select(['id','name'])->toArray();
        
            
                $query = $this->Grades->find('all',['contain' => ['Students','Subjects']
                                        ,'order'=> ['Subjects.Subjectname'=>'DESC']
                                    ])
                        ->where(['teacher_id'=>$id])
                        ->toArray();
                $this->set(compact('query'));
                
        // lấy những điểm mà giáo viên đã vào điểm dựa vào teacher_id
    }
    
    public function studentView($id = null){
        $query = $this->Grades->find('all',['contain' => ['Teachers','Subjects']
                                        ,'order'=> ['Subjects.Subjectname'=>'DESC']
                                    ])
                        ->where(['student_id'=>$id])
                        ->toArray();
        // lấy những điểm của sinh viên đã vào điểm dựa vào student_id    
        $this->set(compact('query'));
    }

}


 ?>