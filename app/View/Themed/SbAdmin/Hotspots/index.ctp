<?php
$search = '
<form action ="/Hotspots/search" method="GET">
<div class="input-group custom-search-form">
    <input type="text" name="keyword" class="form-control" placeholder="Search...">
    <span class="input-group-btn">
        <button class="btn btn-default" type="button">
            <i class="fa fa-search"></i>
        </button>
    </span>
    </div>
</form>
    ';

echo $search_bar ='
<div class="row">
    <div class="col-md-8"></div>
    <div class="col-md-4">'.$search.'</div>
    </div>'; 

?>
<br />
<form action ="/Hotspots/mass_delete" method="POST">
<?php

$create  = '<span><a class="btn btn-primary" href="/Hotspots/add">Create</a></span>';;
$delete  = '<span><button type="submit" class="btn btn-danger" onclick="if (confirm(&quot;Are you sure you wish to delete these tickets ?&quot;)) { document.post_57624a6f587b2226536133.submit(); } event.returnValue = false; return false;">Delete</button></span>';;
$paginator = $this->Element('paginator');
$footer ="<table style='width:100%;height:20px'  border='0'><tr><td>{$delete}&nbsp;{$create}</td><td><span class='pull-right'>{$paginator}</span></td></tr></table>";

echo $this->Table->create( 
       array( 
           'bordered' => TRUE, 
           'condensed' => TRUE, 
           'hover' => '#FB1', 
           'responsive' => TRUE, 
           'striped' => TRUE, 
           'cols_width' => array( '20px','20px', '100px', '20px', '10px','60px' ), 
           'panel_class' => 'panel-info', 
           'panel_heading' => '<h4>Ticket Management Panel</h4>', 
           'panel_body' => '', 
           'panel_footer' => $footer, 
           'style' => '' ) 
       );


#debug($users);
if($hotspots){
    Foreach( $hotspots as $hotspot ){

    #debug($hotspot);
        $volume = $this->requestAction('/Radaccts/volume/' . $hotspot['Hotspot']['username']);
        $checkbox = $this->Form->checkbox('checkList.', 
                                        array( 
                                               'value'  => $hotspot['Hotspot']['id'],
                                               'id'     => 'user'.$hotspot['Hotspot']['id'], 
                                               'error' => false, 
                                               'placeholder' => false,
                                               'div'=>false,
                                               'label'=>false,
                                               'class' => '', 
                                               'data-off-text'=>'No', 
                                               'data-on-text' =>'Yes', 
                                               'hiddenField'=>true) 
                                     );

        $delete = $this->Form->postLink(
                    'Delete',
                    array('controller' => 'Hotspots', 'action' => 'delete', $hotspot['Hotspot']['id']),
                    array(  
                            'confirm' => 'Are you sure you wish to delete this user ?',
                            'class'   => 'btn btn-outline btn-danger'
                        )
                );
        $data[] = array( 
            "<center>{$checkbox}</center>",
            $hotspot['Hotspot']['id'],  
            $hotspot['Hotspot']['username'],  
            $hotspot['Package']['title'],  
            $this->Number->toReadableSize($volume),
            $this->Time->timeAgoInWords($hotspot['Hotspot']['expired']),  
            $this->Time->timeAgoInWords($hotspot['Hotspot']['created']),  
            "<center>".$this->requestAction('/Radaccts/status/' . $hotspot['Hotspot']['username'])."</center>",
            "<center><a class='btn btn-outline btn-success' href='/Hotspots/view/{$hotspot['Hotspot']['id']}'><span class='glyphicon glyphicon-search'></span></a> <a class='btn btn-outline btn-primary' href='/Hotspots/edit/{$hotspot['Hotspot']['id']}'><span class='glyphicon glyphicon-edit'></span></a> <a class='btn btn-outline btn-danger' href='/Hotspots/delete/{$hotspot['Hotspot']['id']}'><span class='glyphicon glyphicon-trash'></span></a></center>"
        );
    } // Foreach

    if($data) {
        $sort_id = $this->Paginator->sort('id');
        $sort_username = $this->Paginator->sort('username');
        $sort_package = $this->Paginator->sort('Package.id','Package');
        $sort_expired = $this->Paginator->sort('expired');
        $sort_created = $this->Paginator->sort('created');
        echo $this->Table->tableHeaders( array('', $sort_id, $sort_username, $sort_package,'Volume',$sort_expired, $sort_created,'Status',null ) );
        echo $this->Table->tableCells( $data );

        echo $this->Table->end();
    } // if($data)
} // if ($hotspots)
?>
</form>
