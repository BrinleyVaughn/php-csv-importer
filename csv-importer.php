<?php

function import_csv($file) {
    
    $output = array (
        'headers' => array(),
        'rows' => array()
    );
    
    // Validation
    if( !empty($file) ){
    
        // Get the file extension
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        
        if( empty($extension) || $extension != 'csv' ) return $output;
        
        // Read the file contents (r = read mode)
        $csv = fopen($file['tmp_name'], 'r');
        $delimiter = ',';
        
        $headers = fgetcsv($csv, 0, $delimiter);
        
        $rows = array();
        $row_number = 0;
        while( $csv_row = fgetcsv($csv, 0, $delimiter) ){
            $row_number++;
            
            $encoded_row = array_map('utf8_encode', $csv_row);
            
            if( count($encoded_row) !== count($headers)) {
                return 'Row ' . $row_number . '\'s length does not match the header length: ' . implode(', ', $encoded_row);
                
            }
            else {
                $rows[] = array_combine($headers, $encoded_row);
            }
            
            if( $row_number === 5 ) {
                break;
            }
        }
        
        $output['headers'] = $headers;
        $output['rows'] = $rows;
    }
        
    return $output;
}
