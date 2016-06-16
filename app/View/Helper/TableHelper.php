<?php
/**
 * Bootstrap Table Helper
 *
 * Licensed under The GPL3 License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 */

App::uses('HtmlHelper', 'View/Helper');

/**
 * Usage example:
 *	echo $this->Table->create( array( 'bordered' => TRUE, 'condensed' => TRUE, 'hover' => '#FB1', 'responsive' => TRUE, 'striped' => TRUE, 'cols_width' => array( '10%', '40%', '40%', '10%' ), 'panel_class' => 'panel-danger', 'panel_heading' => 'Nice heading', 'panel_body' => 'A body panel...', 'panel_footer' => 'A footer panel...', 'style' => 'font-style: italic' ) );
 *	echo $this->Table->tableHeaders( array( '#', 'Name', 'Surname', 'Birth' ) );
 *	echo $this->Table->tableCells( array(
 *		array( '1', 'John', 'Doh', '1970-01-01'),
 *		array( '2', 'Max', 'Damage', '1980-12-12'),
 *		array( '3', 'Jane', 'Cake', '1985-06-06'),
 *	) );
 *	echo $this->Table->tableFooters( array( '#', 'Date', 'Title', 'Active') );
 *	// From a query like: $this->MyTable->find( 'all' )
 *	// echo $this->Table->tableFromData( $data, array( 'header' => TRUE ) );
 *	echo $this->Table->end();
 */
class TableHelper extends HtmlHelper
{
	private $responsive;
	private $panel_heading;
	private $panel_footer;
	private $cnt = 0;

	/**
	 *	Create a table
	 *
	 *	Available options:
	 *	'bordered' - add borders to table [TRUE or FALSE]
	 *	'class' - add class/classes to table class attribute
	 *	'cols_width' - set column widths (string: value for each column, array of strings: set columns individually)
	 *	'condensed' - compact table style [TRUE or FALSE]
	 *	'hover' - set mouse hover background [TRUE or FALSE or color string]
	 *	'id' - set table id attribute
	 *	'panel_heading' - add a panel before the table with title $options['panel_heading']
	 *		'panel_class' - set panel class (ex. 'panel-primary', 'panel-success', etc.)
	 *		'panel_body' - set a panel body with content $options['panel_body']
	 *		'panel_footer' - set a panel footer with content $options['panel_footer']
	 *	'responsive' - add a responsive around the table
	 *	'striped' - striped table
	 *	'style' - set table style attribute
	 */
	public function create( $options = NULL )
	{
		$this->cnt++;
		$this->panel_footer = NULL;
		$css_head = '';
		$class = 'table';
		$table = '';
		$style = !isset( $options['style'] ) ? '' : ( ' style="' . $options['style'] . '"' );
		$id = !isset( $options['id'] ) ? ( 'tblhlp' . $this->cnt ) : $options['id'];
		if( isset( $options['panel_heading'] ) && !empty( $options['panel_heading'] ) )
		{
			$this->panel_heading = $options['panel_heading'];
			$table .= '<div id="pan' . $id . '" class="panel ' . ( isset( $options['panel_class'] ) ? $options['panel_class'] : 'panel-default' ) . '"><div class="panel-heading">' . $this->panel_heading . "</div>\n";
			if( isset( $options['panel_body'] ) && !empty( $options['panel_body'] ) ) $table .= '<div class="panel-body">' . $options['panel_body'] . "</div>\n";
			if( isset( $options['panel_footer'] ) && !empty( $options['panel_footer'] ) ) $this->panel_footer = $options['panel_footer'];
		}
		else $this->panel_heading = NULL;
		if( isset( $options['responsive'] ) && $options['responsive'] )
		{
			$this->responsive = TRUE;
			$table .= '<div class="table-responsive">';
		}
		else $this->responsive = FALSE;
		if( isset( $options['bordered'] ) && $options['bordered'] ) $class .= ' table-bordered';
		if( isset( $options['cols_width'] ) )
		{
			if( is_string( $options['cols_width'] ) ) $css_head .= '#' . $id . ' td, #' . $id . ' th { width: ' . $options['cols_width'] . ' } ';
			else if( is_array( $options['cols_width'] ) )
			{
				$col = 0;
				foreach( $options['cols_width'] as $width )
				{
					$col++;
					if( !empty( $width ) ) $css_head .= '#' . $id . ' td:nth-child(' . $col . '), #' . $id . ' th:nth-child(' . $col . ') { width: ' . $width . ' } ';
				}
			}
		}
		if( isset( $options['condensed'] ) && $options['condensed'] ) $class .= ' table-condensed';
		if( isset( $options['hover'] ) )
		{
			if( is_string( $options['hover'] ) )
			{
				$class .= ' table-hover';
				$css_head .= '#' . $id . '.table-hover tr:hover td { background: ' . $options['hover'] . ' } ';
			}
			else if( $options['hover'] ) $class .= ' table-hover';
		}
		if( isset( $options['striped'] ) && $options['striped'] ) $class .= ' table-striped';
		if( isset( $options['class'] ) ) $class .= ' ' . $options['class'];
		$table .= "<table class=\"${class}\" id=\"${id}\"${style}>\n";
		if( !empty( $css_head ) ) $this->_View->append( 'css', '<style>' . $css_head . '</style>' );
		return $table;
	}

	/**
	 *	Close a table
	 */
	public function end() { return '</table>' . ( $this->responsive ? '</div>' : '' ) . ( $this->panel_heading !== NULL ? ( $this->panel_footer !== NULL ? ( '<div class="panel-footer">' . $this->panel_footer . '</div></div>' ) : '</div>' ) : '' ) . "\n"; }

	/**
	 *	Add footers cells
	 */
	public function tableFooters( $names, $trOptions = NULL, $thOptions = NULL )
	{
		$headers  = '<tfoot>';
		$headers .= parent::tableHeaders( $names, $trOptions, $thOptions );
		$headers .= "</tfoot>\n";
		return $headers;
	}

	/**
	 *	Add table content from a query
	 *
	 *	Available options:
	 *	'header' - set table header from column names [TRUE or FALSE or array of string names]
	 */
	public function tableFromData( $data, $options = NULL )
	{
		$table = '';
		$model = NULL;
		$tr = 0;
		foreach( $data as $row )
		{
			if( $model == NULL )
			{	// First row only
				$model = key( $row );
				if( isset( $options['header'] ) )
				{
					$tc = 0;
					if( is_array( $options['header'] ) )
					{
						$table .= '<thead><tr>';
						foreach( $options['header'] as $value ) $table .= '<th class="c' . ++$tc . '">' . $value . '</th>';
						$table .= "</tr></thead>\n";
					}
					else if( $options['header'] )
					{
						$table .= '<thead><tr>';
						foreach( $row[$model] as $key => $value ) $table .= '<th class="c' . ++$tc . '">' . ucfirst( $key ) . '</th>';
						$table .= "</tr></thead>\n";
					}
				}
				$table .= "<tbody>\n";
			}
			$tr++;
			$tc = 0;
			$table .= '<tr' . ( isset( $row[$model]['id'] ) ? ( ' id="rid' . $row[$model]['id'] . '"' ) : '' ) . ' class="r' . $tr . '">';
			foreach( $row[$model] as $key => $value ) $table .= '<td class="c' . ++$tc . '">' . $value . '</td>';
			$table .= "</tr>\n";
		}
		if( $table != '' ) $table .= "</tbody>\n";
		return $table;
	}

	/**
	 *	Add headers cells
	 *
	 *	Same as parent tableHeaders plus thead tags
	 */
	public function tableHeaders( $names, $trOptions = NULL, $thOptions = NULL )
	{
		$headers  = '<thead>';
		$headers .= parent::tableHeaders( $names, $trOptions, $thOptions );
		$headers .= "</thead>\n";
		return $headers;
	}
}
