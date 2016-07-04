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

Foreach( $hotspots as $hotspot ){

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
            $hotspot['Hotspot']['expired'],  
            $hotspot['Hotspot']['created'],
            "<center><a class='btn btn-outline btn-primary' href='/Users/edit/{$hotspot['Hotspot']['id']}'>Edit</a> {$delete} </center>"
        );
}

#debug($data);
$sort_id = $this->Paginator->sort('id');
$sort_username = $this->Paginator->sort('username');
$sort_role = $this->Paginator->sort('expired');
$sort_created = $this->Paginator->sort('created');
echo $this->Table->tableHeaders( array('', $sort_id, $sort_username, $sort_role, $sort_created,null ) );
echo $this->Table->tableCells( $data );
#echo $this->Table->tableCells( array(
#            array( '1', 'John', 'Doh', '1970-01-01'),
#            array( '2', 'Max', 'Damage', '1980-12-12'),
#            array( '3', 'Jane', 'Cake', '1985-06-06'),
#            ) );


#echo $this->Table->tableFromData( $users, array( 'header' => TRUE ) );

echo $this->Table->end();
?>
</form>
