<?php
class DisconnectShell extends AppShell {
    
    public $uses = array('Hotspot');

    public function show() {
        $data  = $this->Hotspot->findByDisconnect(1);
        $user = null;
        if($data) $user  = $data['Hotspot']['username'];
        require('/var/www/html/wifi_manager/app/webroot/mikrotik/routeros-api/routeros_api.class.php');

        $API = new RouterosAPI();
        $API->debug = true;
        if($user){
            if ($API->connect('192.168.0.103', 'admin', '')) {

                $API->write('/ip/hotspot/active/print');

                $READ = $API->read(false);
                $ARRAY = $API->parseResponse($READ);

                foreach ($ARRAY as $value) {
                    print_r($value);
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

    public function disconnect(){
        $this->Hotspot->id = "1";
        $this->Hotspot->set(array('disconnect'=>"0")); 
        $this->Hotspot->save();
    }
}
