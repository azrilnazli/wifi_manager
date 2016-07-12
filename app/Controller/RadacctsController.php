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
        $options =  array(
            'fields'     => array( 
                                    'time_to_sec(timediff(Radacct.acctstoptime,Radacct.acctstarttime)) as second',
                                    'timediff(Radacct.acctstoptime,Radacct.acctstarttime) as duration',
                                    '(Radacct.acctinputoctets + Radacct.acctoutputoctets) as volume',
                                    'Radacct.acctstarttime',
                                    'Radacct.framedipaddress',
                                ),
            'conditions' => array('Radacct.username' => $username),
        );
        $data = $this->Radacct->find('all', $options);
        return $data;
    }

    function timediff($date1=null,$date2=null){
        debug($date1);
        #$db = ConnectionManager::getDataSource('default');
        #$sql = "select time_to_sec(timediff($date1,$date2)) as diff";
        #$data = $db->query($sql);
        #return $data[0][0];
    }
}
