<?php

class MyReadFilter implements PHPExcel_Reader_IReadFilter
{ 
    private $_startRow = 0; 
    private $_endRow   = 0; 
    private $_columns  = array(); 

    /**  Get the list of rows and columns to read  */ 
    public function __construct($startRow, $endRow) { 
        $this->_startRow = $startRow; 
        $this->_endRow   = $endRow; 
        $this->_columns  = $columns; 
        } 

 	public function readCell($columns, $row, $worksheetName = '') {
        //  Only read the heading row, and the rows that are configured in $this->_startRow and $this->_endRow
        if (($row == 1) || ($row >= $this->_startRow && $row < $this->_endRow)) {
            return true;
        }
        return false;
    }
}