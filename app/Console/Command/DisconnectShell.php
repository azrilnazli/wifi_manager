<?php
class DisconnectShell extends AppShell {
    public $uses = array('Hotspot','Radacct');


    public function api() {
        $data  = $this->Hotspot->findByDisconnect(1);
        $user = null;
        if($data) $user  = $data['Hotspot']['username'];
        require('/var/www/html/wifi_manager/app/webroot/mikrotik/routeros-api/routeros_api.class.php');

        $API = new RouterosAPI();
        //$API->debug = true;
        $API->debug = FALSE;
        if($user){
            if ($API->connect('192.168.10.1', 'admin', '')) {

                $API->write('/ip/hotspot/active/print');

                $READ = $API->read(false);
                $ARRAY = $API->parseResponse($READ);

                foreach ($ARRAY as $value) {
                    //print_r($value);
                    if ($value['user'] == $user) {
                        $id = $value['.id']; 
                        $API->write("/ip/hotspot/active/remove", false);
                        $API->write("=.id={$id}");
                        $API->read();   
                    }   
                }
                #print_r($ARRAY);
                $API->disconnect();
                $this->out("User {$user} has been disconnected", true);
                #$this->Hotspot->id = $data['Hotspot']['id'];
                $this->Hotspot->read(null,  $data['Hotspot']['id']);
                $this->Hotspot->set(
                            array(
                                    'disconnect'=> 0 
                                )
                            );
                $this->Hotspot->save();
            } // connect
        }// user
    }

    public function radclient(){
        $user  = $this->Hotspot->findByDisconnect(1);
        $cmd = null;
        if($user){ 
            $username  = $user['Hotspot']['username'];

            $options   =  array(
                'fields'     => array(
                                    'Radacct.framedipaddress',
                                    'Radacct.nasipaddress',
                                    'Radacct.acctsessionid',
                                    'Radacct.username',
                                    'Radacct.calledstationid',
                                ),
                'conditions' => array(
                                        'AND' => array(
                                                        'Radacct.username' => $username,
                                                        'Radacct.acctstoptime' => NULL 
                                                        )
                                    )
                );
    
            $data = $this->Radacct->find('first', $options);
            if($data){
                $disconnect = "User-Name=\"{$data['Radacct']['username']}\", NAS-IP-Address=\"{$data['Radacct']['nasipaddress']}\",  Acct-Session-Id=\"{$data['Radacct']['acctsessionid']}\", Called-Station-Id=\"{$data['Radacct']['calledstationid']}\", Framed-IP-Address=\"{$data['Radacct']['framedipaddress']}\" ";
                $cmd = "echo -e {$disconnect} | radclient -n 1 -r 3 {$data['Radacct']['nasipaddress']}:3799 disconnect testing123 ";
                if( shell_exec($cmd)) {
            #debug($result);
                    $this->out("User {$username} has been disconnected", true);
                    $this->Hotspot->read(null,  $user['Hotspot']['id']);
                    $this->Hotspot->set(
                            array(
                                    'disconnect'=> 0
                                )
                            );
                    $this->Hotspot->save();
                }
            }
        }
    }
}
