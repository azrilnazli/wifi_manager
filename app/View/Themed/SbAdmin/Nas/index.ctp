<?php
$search = '
<form action ="/Nas/search" method="GET">
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
<form action ="/Nas/mass_delete" method="POST">
<?php

$create  = '<span><a class="btn btn-primary" href="/Nas/add">Create</a></span>';;
$delete  = '<span><button type="submit" class="btn btn-danger" onclick="if (confirm(&quot;Are you sure you wish to delete these Nas ?&quot;)) { document.post_57624a6f587b2226536133.submit(); } event.returnValue = false; return false;">Delete</button></span>';;
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
           'panel_heading' => '<h4>Nas Management Panel</h4>', 
           'panel_body' => '', 
           'panel_footer' => $footer, 
           'style' => '' ) 
       );


#debug($users);
if($nass){
Foreach( $nass as $nas ){

    $checkbox = $this->Form->checkbox('checkList.', 
                                        array( 
                                               'value'  => $nas['Nas']['id'],
                                               'id'     => 'nas'.$nas['Nas']['id'], 
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
                    array('controller' => 'Nas', 'action' => 'delete', $nas['Nas']['id']),
                    array(  
                            'confirm' => 'Are you sure you wish to delete this nas ?',
                            'class'   => 'btn btn-outline btn-danger'
                        )
                );


    $data[] = array( 
            "<center>{$checkbox}</center>",
            $nas['Nas']['id'],  
            $nas['Nas']['shortname'],  
            $nas['Nas']['nasname'],  
            $nas['Nas']['secret'],
	        $nas['Nas']['description'],
            "<center><a class='btn btn-outline btn-success' href='/Nas/view/{$nas['Nas']['id']}'><span class='glyphicon glyphicon-search'></span></a> <a class='btn btn-outline btn-primary' href='/Nas/edit/{$nas['Nas']['id']}'><span class='glyphicon glyphicon-edit'></span></a> <a class='btn btn-outline btn-danger' href='/Nas/delete/{$nas['Nas']['id']}'><span class='glyphicon glyphicon-trash'></span></a></center>"
            #"<center><a class='btn btn-outline btn-primary' href='/Nas/edit/{$nas['Nas']['id']}'>Edit</a> <a class='btn btn-outline btn-primary' href='/Nas/delete/{$nas['Nas']['id']}'>Delete</a </center>"
        );
}

#debug($data);
$sort_id            = $this->Paginator->sort('id');
$sort_shortname     = $this->Paginator->sort('shortname');
$sort_nasname       = $this->Paginator->sort('nasname');
$sort_secret        = $this->Paginator->sort('secret');
$sort_description   = $this->Paginator->sort('description');

echo $this->Table->tableHeaders( array('', $sort_id, $sort_shortname, $sort_nasname, $sort_secret,$sort_description, null ) );
echo $this->Table->tableCells( $data );
#echo $this->Table->tableCells( array(
#            array( '1', 'John', 'Doh', '1970-01-01'),
#            array( '2', 'Max', 'Damage', '1980-12-12'),
#            array( '3', 'Jane', 'Cake', '1985-06-06'),
#            ) );


#echo $this->Table->tableFromData( $users, array( 'header' => TRUE ) );

echo $this->Table->end();
}
?>
</form>
