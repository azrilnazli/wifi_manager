 <?php
        function secondsToTime($seconds) {
                $dtF = new \DateTime('@0');
                $dtT = new \DateTime("@$seconds");
                return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
        }
        $total_time = null;
        $total_volume = null;
        if($radaccts):
        Foreach($radaccts as $k => $data):
            $row[$k]['username'] = $data['Radacct']['username'];
            $row[$k]['calledstationid'] = $data['Radacct']['calledstationid'];
            $row[$k]['connect'] = $this->Time->timeAgoInWords($data['Radacct']['acctstarttime']);
            $row[$k]['framedipaddress'] = $data['Radacct']['framedipaddress'];
            $row[$k]['duration']= $data[0]['duration'];
            $row[$k]['volume']= $this->Number->toReadableSize($data[0]['volume']);
            $total_time     += $data[0]['second'];
            $total_volume   += $data[0]['volume'];
        endforeach;
        $volume = $this->requestAction('/Radaccts/total_volume/');
        $total_volume   = $this->Number->toReadableSize($volume);
        $paginator = $this->Element('paginator');
        echo $this->Table->create(
        array(
           'bordered' => TRUE,
           'condensed' => TRUE,
           'hover' => '#FB1',
           'responsive' => TRUE,
           'striped' => TRUE,
           'cols_width' => array( '20px','20px', '100px', '20px', '10px','60px' ),
           'panel_class' => 'panel-info',
           'panel_heading' => '<h3><span class="fa fa-list-alt"></span> Dashboard</h3>',
           'panel_body' => "Total volume : <strong>{$total_volume}</strong><strong>",
           //'panel_footer' => $paginator,
           'style' => '' )
       );
        echo $this->Table->tableHeaders( array('Username','NAS','Last Online','IP' ,'Duration' , 'Volume') );
        echo $this->Table->tableCells( $row );
        echo $this->Table->end();
        echo "<span class='pull-right'>{$paginator}</span>";
        endif;

