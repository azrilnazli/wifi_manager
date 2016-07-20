<?php
App::uses('AppController', 'Controller');
/**
 * Snmpmrtgs Controller
 *
 * @property Snmpmrtg $Snmpmrtg
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class SnmpmrtgsController extends AppController {
    
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
		$this->Snmpmrtg->recursive = 0;
		$this->set('snmpmrtgs', $this->Paginator->paginate());
	}


   public function search(){
        $keyword = $_GET['keyword'];
        $this->Snmpmrtg->recursive = 0;
        $this->paginate = array(
                        //'fields' => array('Snmpmrtg.id', 'Snmpmrtg.groupname','Snmpmrtg.role', 'Snmpmrtg.created'),
                        'limit'  => 20,
                        'order'  => array( 'id' => 'desc' ),
                        'conditions' => array('Snmpmrtg.device LIKE' =>  $keyword . '%'),

                        );
        $results =  $this->paginate();
        #debug($results);
               if(empty($results)){
                    $this->Session->setFlash(__('You search yield no results. Please try another keyword'), 'flash_error');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->set( 'snmpmrtgs', $this->paginate() );
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
		if (!$this->Snmpmrtg->exists($id)) {
			throw new NotFoundException(__('Invalid snmpmrtg'));
		}
		$options = array('conditions' => array('Snmpmrtg.' . $this->Snmpmrtg->primaryKey => $id));
		$this->set('snmpmrtg', $this->Snmpmrtg->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Snmpmrtg->create();
            $this->request->data['Snmpmrtg']['user_id'] = $this->Auth->user('id');
			if ($this->Snmpmrtg->save($this->request->data)) {
			#if ($this->Snmpmrtg->validates($this->request->data)) {
                $this->Session->setFlash(__('The device has been saved'), 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The device cannot be saved. Please try again'), 'flash_error');
				#return $this->redirect(array('action' => 'index'));
			}
		}
		$users = $this->Snmpmrtg->User->find('list');
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
		if (!$this->Snmpmrtg->exists($id)) {
			throw new NotFoundException(__('Invalid snmpmrtg'));
		}
		if ($this->request->is(array('post', 'put'))) {
            #debug($this->request->data);
            #die();
            $this->request->data['Snmpmrtg']['user_id'] = $this->Auth->user('id');
			if ($this->Snmpmrtg->save($this->request->data)) {
                $this->Session->setFlash(__('The device has been saved'), 'flash_success');
                return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The device cannot be saved. Please try again'), 'flash_error');
                #return $this->redirect(array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Snmpmrtg.' . $this->Snmpmrtg->primaryKey => $id));
			$this->request->data = $this->Snmpmrtg->find('first', $options);
		}
		$users = $this->Snmpmrtg->User->find('list');
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
		$this->Snmpmrtg->id = $id;
		if (!$this->Snmpmrtg->exists()) {
			throw new NotFoundException(__('Invalid snmpmrtg'));
		}
		#$this->request->allowMethod('post', 'delete');
		if ($this->Snmpmrtg->delete()) {
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

                $this->Snmpmrtg->id = $id;
                $this->Snmpmrtg->delete();
            }
        }
        $this->Session->setFlash(__('The devices has been deleted'), 'flash_success');
        return $this->redirect(array('action' => 'index'));
    }
}
