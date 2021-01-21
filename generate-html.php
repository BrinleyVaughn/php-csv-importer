<?php

function generate_csv_html(array $data) {
    
    $headers = $data['headers'];
    $rows = $data['rows'];
    
    if(empty($rows)) {
        return 'Nothing imported.';
    } 
    
    $html = '<table class=" table table-striped mt-3"><tbody>';
    
    if (!empty($headers)) {
        $html .= '<tr>';
        
        foreach($headers as $header) {
            $html .= '<th>' . strip_tags($header) . '</th>';
        }
        
        $html .= '</tr>';
    }
    
    foreach ($rows as $columns) {
        
        $html .= '<tr>';
        foreach ($columns as $column) {
            $html .= '<td>' . strip_tags($column) . '</td>';
        }
        $html .= '</tr>';
    }
    
    $html .= '</tbody></table>';
    
    return $html;
}