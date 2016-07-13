<div id="pantblhlp1" class="panel panel-info">
    <div class="panel-heading">
        <h3><span class="fa fa-tag"></span> <?=$hotspot['Hotspot']['username'];?></h3>
    </div>
    <div class="panel-body">
<?php #debug($hotspot); ?>
    <dl class="dl-horizontal">
        <dt>Username</dt>
        <dd><?=$hotspot['Hotspot']['username'];?></dd>
        <dt>Password</dt>
        <dd><?=$hotspot['Hotspot']['password'];?></dd>
        <dt>Created On</dt>
        <dd><?=$hotspot['Hotspot']['created'];?></dd>
        <dt>Expired in</dt>
        <dd><?=$this->Time->timeAgoInWords($hotspot['Hotspot']['expired']);?></dd>
        <dt>Created By</dt>
        <dd><?=$hotspot['User']['username'];?></dd>
        <dt>Package</dt>
        <dd><?=$hotspot['Package']['title'];?></dd>
        <dt>Upload Speed</dt>
        <dd><?=$hotspot['Package']['upload'];?></dd>
        <dt>Download Speed</dt>
        <dd><?=$hotspot['Package']['download'];?></dd>
        <dt>Concurrent</dt>
        <dd><?=$hotspot['Hotspot']['concurrent'];?></dd>
        <dt>Idle Timeout</dt>
        <dd>15 minute</dd>
    </dl>

    </div>
</div>
        <?php
        $detail = $this->requestAction( '/Radaccts/detail/' . $hotspot['Hotspot']['username']);
        function secondsToTime($seconds) {
                $dtF = new \DateTime('@0');
                $dtT = new \DateTime("@$seconds");
                return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
        }
        $total_time = null;
        $total_volume = null;
        if($detail):
        Foreach($detail as $k => $data):
            $row[$k]['connect'] = $this->Time->timeAgoInWords($data['Radacct']['acctstarttime']);
            $row[$k]['framedipaddress'] = $data['Radacct']['framedipaddress'];
            $row[$k]['duration']= $data[0]['duration'];
            $row[$k]['volume']= $this->Number->toReadableSize($data[0]['volume']);
            $total_time     += $data[0]['second'];
            $total_volume   += $data[0]['volume'];
        endforeach;
        $total_volume   = $this->Number->toReadableSize($total_volume);
        $total_time     = secondsToTime($total_time);
        echo $this->Table->create(
        array( 
           'bordered' => TRUE, 
           'condensed' => TRUE,
           'hover' => '#FB1',
           'responsive' => TRUE,
           'striped' => TRUE,
           'cols_width' => array( '20px','20px', '100px', '20px', '10px','60px' ),
           'panel_class' => 'panel-info',
           'panel_heading' => '<h3><span class="fa fa-list-alt"></span> Usage History</h3>',
           'panel_body' => '',
           'panel_footer' => "Total volume : <strong>{$total_volume}</strong> | Total time : <strong>{$total_time}</strong>",
           'style' => '' )
       );
        echo $this->Table->tableHeaders( array('Date','IP' ,'Duration' , 'Volume') );
        echo $this->Table->tableCells( $row );
        echo $this->Table->end();
        endif;
        ?>
