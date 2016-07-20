<?php
App::uses('AppController', 'Controller');
/**
 * Nmsmonitors Controller
 *
 * @property Nmsmonitor $Nmsmonitor
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class NmsmonitorsController extends AppController {
    
    public $theme = 'SbAdmin';

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Time', 'Number');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Nmsmonitor->recursive = 0;
		$this->set('nmsmonitors', $this->Paginator->paginate());
	}


   public function search(){
        $keyword = $_GET['keyword'];
        $this->Nmsmonitor->recursive = 0;
        $this->paginate = array(
                        //'fields' => array('Nmsmonitor.id', 'Nmsmonitor.groupname','Nmsmonitor.role', 'Nmsmonitor.created'),
                        'limit'  => 20,
                        'order'  => array( 'id' => 'desc' ),
                        'conditions' => array('Nmsmonitor.device LIKE' =>  $keyword . '%'),

                        );
        $results =  $this->paginate();
        #debug($results);
               if(empty($results)){
                    $this->Session->setFlash(__('You search yield no results. Please try another keyword'), 'flash_error');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->set( 'nmsmonitors', $this->paginate() );
                    $this->render('index');
                }
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Nmsmonitor->exists($id)) {
			throw new NotFoundException(__('Invalid nmsmonitor'));
		}
		$options = array('conditions' => array('Nmsmonitor.' . $this->Nmsmonitor->primaryKey => $id));
		$this->set('nmsmonitor', $this->Nmsmonitor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Nmsmonitor->create();
            $this->request->data['Nmsmonitor']['user_id'] = $this->Auth->user('id');
			if ($this->Nmsmonitor->save($this->request->data)) {
                $this->Session->setFlash(__('The device has been saved'), 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The device cannot be saved. Please try again'), 'flash_error');
				return $this->redirect(array('action' => 'index'));
			}
		}
		$users = $this->Nmsmonitor->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Nmsmonitor->exists($id)) {
			throw new NotFoundException(__('Invalid nmsmonitor'));
		}
		if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Nmsmonitor']['user_id'] = $this->Auth->user('id');
			if ($this->Nmsmonitor->save($this->request->data)) {
                $this->Session->setFlash(__('The device has been saved'), 'flash_success');
                return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The device cannot be saved. Please try again'), 'flash_error');
                return $this->redirect(array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Nmsmonitor.' . $this->Nmsmonitor->primaryKey => $id));
			$this->request->data = $this->Nmsmonitor->find('first', $options);
		}
		$users = $this->Nmsmonitor->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Nmsmonitor->id = $id;
		if (!$this->Nmsmonitor->exists()) {
			throw new NotFoundException(__('Invalid nmsmonitor'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Nmsmonitor->delete()) {
            $this->Session->setFlash(__('The devices has been deleted'), 'flash_success');
            return $this->redirect(array('action' => 'index'));
		} else {
            $this->Session->setFlash(__('The devices cannot be deleted. Please try again'), 'flash_error');
            return $this->redirect(array('action' => 'index'));
		}
	}

    public function mass_delete(){
        $this->request->allowMethod('post');
        #debug($this->data);
        foreach($this->data['checkList'] as $id){
            if(!empty($id)){

                $this->Nmsmonitor->id = $id;
                $this->Nmsmonitor->delete();
            }
        }
        $this->Session->setFlash(__('The devices has been deleted'), 'flash_success');
        return $this->redirect(array('action' => 'index'));
    }
}
