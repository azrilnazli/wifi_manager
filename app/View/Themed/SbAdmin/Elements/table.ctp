<?php
echo $this->Table->create( array( 'bordered' => TRUE, 'condensed' => TRUE, 'hover' => '#FB1', 'responsive' => TRUE, 'striped' => TRUE, 'cols_width' => array( '50px', '30%', NULL, '20%' ), 'panel_class' => 'panel-danger', 'panel_heading' => 'Nice heading', 'panel_body' => 'A body panel...', 'panel_footer' => 'A footer panel...', 'style' => 'font-style: italic' ) );
echo $this->Table->tableHeaders( array( '#', 'Name', 'Surname', 'Birth' ) );
echo $this->Table->tableCells( array(
        array( '1', 'John', 'Doh', '1970-01-01'),
            array( '2', 'Max', 'Damage', '1980-12-12'),
                array( '3', 'Jane', 'Cake', '1985-06-06'),
            ) );
echo $this->Table->tableFooters( array( '#', 'Name', 'Surname', 'Birth' ) );
echo $this->Table->end();
?>
