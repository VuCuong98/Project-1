<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    // hàm khởi tạo cho phép phương thức logout 
    public function initialize()
    {
    parent::initialize();
    $this->Auth->allow(['logout']); 
    }

    // hàm index để thể hiện tất cả các user có trong bảng 
    public function index()
    {
        $users = $this->paginate($this->Users); // lấy các dữ liệu trong bản user 

        $this->set(compact('users')); // chuyển dữ liệu qua view bằng hàm set
    }

   
  
    // hàm để xem thông tin chi tiết của từng user truyền vào id của user
    public function view($id = null) 
    {
        $user = $this->Users->get($id, [ 
            'contain' => []
        ]); 
        // lấy các thông tin của user theo id

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */ 
    // hàm thêm người dùng 
    public function add()
    {
        // tạo ra 1 entity user mới
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) { 
        // kiểm tra nếu có submit dữ liệu thì sẽ gán dữ liệu đó cho entity đã tạo
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) { 
                // sau đó save dữ liệu
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    // hàm sửa thông tin người dùng 
    public function edit($id = null)
    {
        // lấy các thông tin của user 
        $user = $this->Users->get($id, [ 
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) { // kiểm tra phương thức nếu là post or patch or put 
            // gán dữ liệu lấy được vào Entity user 
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']); // kiểm tra phương thức  
        // lấy thông tin user dựa trên id 
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            // gọi tới phương thức xóa user 
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login(){
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $user = $this->Auth->identify(); // chứng thực xem có phải là User của hệ thống không?
            if ($user) {  // nếu như đúng 
                $this->Auth->setUser($user); // add thông tin của user vào session
                return $this->redirect($this->Auth->redirectUrl()); // sau đó sẽ hướng vào trang mà trc đó họ muốn đăng nhập
            }
            $this->Flash->error('Your username or password is incorrect.');
        }

    }
    public function logout()
    {
    $this->Flash->success('You are now logged out.');
    return $this->redirect($this->Auth->logout()); // gọi tới phương thức logout để kết thúc phiên làm việc
    }
}
