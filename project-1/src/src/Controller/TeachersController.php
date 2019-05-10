<?php
// src/Controller/ArticlesController.php

namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;


class TeachersController extends AppController
{
	 public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }
    public function index()
    {
        $teachers = $this->paginate($this->Teachers);

        $this->set(compact('teachers'));
    }
   

    public function add(){
    	$teacher = $this->Teachers->newEntity();
    	if($this->request->is('post')){
            $data = $this->request->getData(); // lấy dữ liệu ảnh 
         
            $file = $this->request->data['upload']; // lấy những thông tin của ảnh cho vào 1 mảng biến $file
            //move file
            move_uploaded_file($file['tmp_name'], 'img/teacher_images/'.$file['name']);


    		$teacher = $this->Teachers->patchEntity($teacher,$data);
            $teacher->image = $file['name'];
           
    		if($this->Teachers->save($teacher)){
    			$this->Flash->success(__('Your teacher has been saved.'));
                return $this->redirect(['controller' => 'Users','action' => 'index']);
    		}else {
    			$this->Flash->error(__('Unable to add new teacher'));
    		}
    	}
        $this->set(compact('teacher'));
	}

	public function edit($id){
		$teacher = $this->Teachers->findById($id)->firstOrFail(); //tìm thông tin của giáo viên theo id 
		if($this->request->is(['post', 'put'])) {
            $data = $this->request->getData();
            // lấy các file của ảnh upload 
            $file = $this->request->data['upload'];
            // chuyển ảnh từ thư mục tạm vào trong thư mục img/teacher_images/filename
            move_uploaded_file($file['tmp_name'], 'img/teacher_images/'.$file['name']);

        $this->Teachers->patchEntity($teacher, $this->request->getData());
        $teacher->image = $file['name'];
        // lưu thêm đường dẫn của ảnh 
        if ($this->Teachers->save($teacher)) {
            $this->Flash->success(__('Your edit has been updated.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Unable to update your infomation.'));
    }
		$this->set('teacher',$teacher);

	}

    public function delete($id){
        
        $this->request->allowMethod(['post','delete']);
        $teacher = $this->Teachers->findById($id)->firstOrFail();
        if($this->Teachers->delete($teacher)){
            $this->Flash->success(__('Your infomation has deleted.'));
            return $this->redirect(['action'=>'index']);
        }
        else {
            $this->Flash->error('Unable to update your infomation.');

        }
    }

    public function search(){
       

        $teacherCode = $this->request->getData('teacher_code');
        // lấy mã số giáo viên
        $query = $this->Teachers->find('all',['contain' => ['Subjects']
                                        // ,'order'=> ['Subjects.Subjectname'=>'DESC']
                                    ])
                        ->where(['teacher_code'=>$teacherCode])
                        ->toArray();
        // lấy ra các thông tin của giáo viên có liên quan tới các môn mà giáo viên này dạy dựa vào teacher_code                
     
        $this->set(compact('query'));
  
        }
    }
?>