<?php
// app/Controller/UsergroupsController.php
class UsergroupsController extends AppController {
    
    public $components = array('Paginator');
    #public $theme = 'SimplaAdmin';
    public $scaffold;
    

    
    function home(){
        
        $mode = 'index';
        if( !empty($this->request->params['named']['mode']) ){
            $mode = $this->params['named']['mode']; 
            //debug($mode);
        }
        switch($mode){
            default:
                $default_tab = 'index';
                $tab_title = "Add Group";
            break;
            
            case 'add':
                if ($this->request->is('post')) {
                    $this->add();
                }
                $default_tab = 'form';
                $tab_title = "Add Group";                
            break;
            case 'edit':
                if ($this->request->is('post') || $this->request->is('put') ) {
                    //debug($this->data);
                    $this->edit($this->data['Usergroup']['id']);
                } else {
                    $id = $this->params['named']['id']; 
                    $this->edit($id);
                }
                $default_tab = 'form';
                $tab_title = "Edit Group";               
                #debug($title);
            break;
        }
        
        
        $this->index();       
        $this->set('default_tab', $default_tab);
        $this->set('tab_title', $tab_title);
        $this->set('mode', $mode);
    }
    

    public function index() {
        $this->paginate = array(
            'limit' => 10,
            'order' => array(
                'Usergroup.id' => 'desc'
            )
        );
        $this->Usergroup->recursive = 0;
        $this->set('usergroups', $this->paginate());
    }

    public function view($id = null) {
        $this->Usergroup->id = $id;
        if (!$this->Usergroup->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->Usergroup->read(null, $id));
    }

    public function add() {
        #if ($this->request->is('post')) {
            $this->Usergroup->create();
            if ($this->Usergroup->save($this->request->data)) {
                  #$this->Session->setFlash(__('The user has been saved'));
                  $this->Session->setFlash(__('The group has been saved'), 'flash_success');
                return $this->redirect(array('action' => 'home'));
            } else { 
                
                if ($this->Usergroup->validates()) {
                    // it validated logic
                } else {
                    // didn't validate logic
                    $errors = $this->Usergroup->validationErrors;
                    $this->set('errors', $errors);
                }
                                
                $this->Session->setFlash(
                    __('The group could not be saved. Please, try again.'), 'flash_error'
                );
            }
        #}
    }

    public function edit($id = null) {
        $this->Usergroup->id = $id;
        if (!$this->Usergroup->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Usergroup->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved') , 'flash_success');
                return $this->redirect(array('action' => 'home', 'mode' => 'index'));
            } else {
                $errors = $this->Usergroup->validationErrors;
                $this->set('errors', $errors);

              #  $this->Session->setFlash(
              #      __('The user could not be saved. Please, try again.','flash_error')
              #  );
            }
            
        } else {
            $this->request->data = $this->Usergroup->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->Usergroup->id = $id;
        if (!$this->Usergroup->exists()) {
            throw new NotFoundException(__('Invalid group'));
        }
        if ($this->Usergroup->delete()) {
            $this->Session->setFlash(__('Group deleted'),'flash_success');
            return $this->redirect(array('action' => 'home'));
        }
        $this->Session->setFlash(__('Group was not deleted','flash_error'));
        return $this->redirect(array('action' => 'home'));
    }

}

