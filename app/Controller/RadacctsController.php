<?php
App::uses('AppController', 'Controller');
/**
 * Radaccts Controller
 */
class RadacctsController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;
    
    public $theme = 'SbAdmin';
    
    # system 
    public function system(){}

    public function index() {
        $this->paginate = array(
                'fields'     => array(
                                    'Radacct.username',
                                    'Radacct.calledstationid',
                                    'time_to_sec(timediff(Radacct.acctstoptime,Radacct.acctstarttime)) as second',
                                    'timediff(Radacct.acctstoptime,Radacct.acctstarttime) as duration',
                                    '(Radacct.acctinputoctets + Radacct.acctoutputoctets) as volume',
                                    'Radacct.acctstarttime',
                                    'Radacct.framedipaddress',
                                ),
               // 'conditions' => array('Radacct.username' => $username),
                'limit'  => 20,
                'order'  => array( 'Radacct.radacctid' => 'desc' ),
            );
        $this->set( 'radaccts', $this->paginate() );
    }

    function volume($username=null){
       
        $options = array(
            'fields' => array(
                                'SUM(Radacct.acctinputoctets) as bytes_in',
                                'SUM(Radacct.acctoutputoctets) as bytes_out',
                            ),
            'conditions' => array('Radacct.username' => $username )                
        );
        $data = $this->Radacct->find('first', $options);

        $total = $data[0]['bytes_in'] + $data[0]['bytes_out'];
        return $total;
    }

    function total_volume(){

        $options = array(
            'fields' => array(
                                'SUM(Radacct.acctinputoctets) as bytes_in',
                                'SUM(Radacct.acctoutputoctets) as bytes_out',
                            ),
        );
        $data = $this->Radacct->find('first', $options);

        $total = $data[0]['bytes_in'] + $data[0]['bytes_out'];
        return $total;
    }


   function status($username=null){

        $options = array(
            'fields' => 'Radacct.framedipaddress',
            'conditions' => array('AND' => array (
                                                    'Radacct.username'      => $username,
                                                    'Radacct.acctstoptime'  => null 
                                                )
                                 )
        );
        $data = $this->Radacct->find('first', $options);

        if($data){
            $ip = $data['Radacct']['framedipaddress'];
            return "<span class='btn btn btn-success'><span class='glyphicon glyphicon-user'></span></span>";
        } else {
            return "<span class='fluid btn btn-danger'><span class='glyphicon glyphicon-user''></span></span>";
        }
    }


   function disconnect($username=null){
        
        $options = array(
            'fields' => 'Radacct.framedipaddress',  
            'conditions' => array('AND' => array (  
                                                    'Radacct.username'      => $username,
                                                    'Radacct.acctstoptime'  => null
                                                )
                                 )
        );
        $data = $this->Radacct->find('first', $options);
        
        if($data){
            $ip = $data['Radacct']['framedipaddress'];
            return "<span class='btn btn btn-danger'><span class='fa fa-power-off'></span></span>";
        } else {
            #return "<span class='fluid btn btn-danger'><span class='glyphicon glyphicon-user pull-left'></span></span>";
        }
    }


    function detail($username=null){
        $check = $this->Radacct->findByUsername($username);
        if($check){
            $options =  array(
                'fields'     => array( 
                                    'time_to_sec(timediff(Radacct.acctstoptime,Radacct.acctstarttime)) as second',
                                    'timediff(Radacct.acctstoptime,Radacct.acctstarttime) as duration',
                                    '(Radacct.acctinputoctets + Radacct.acctoutputoctets) as volume',
                                    'Radacct.acctstarttime',
                                    'Radacct.framedipaddress',
                                    'Radacct.nasipaddress',
                                    'Radacct.acctsessionid',
                                    'Radacct.username',
                                    'Radacct.calledstationid',
                                ),
                'conditions' => array('Radacct.username' => $username),
            );
        $data = $this->Radacct->find('all', $options);
        return $data;
        } else {
        return FALSE;
        }
    }

    function timediff($date1=null,$date2=null){
        debug($date1);
        #$db = ConnectionManager::getDataSource('default');
        #$sql = "select time_to_sec(timediff($date1,$date2)) as diff";
        #$data = $db->query($sql);
        #return $data[0][0];
    }
}
