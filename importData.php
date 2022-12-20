<?php
include_once 'conn.php';

if(isset($_POST['importSubmit'])){
    
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $name   = $line[0];
                $City  = $line[1];
                $phone  = $line[2];
                $status = $line[3];
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM members WHERE City = '".$line[1]."'";
                $prevResult = $db->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $db->query("UPDATE members SET name = '".$name."', phone = '".$phone."', status = '".$status."', modified = NOW() WHERE City = '".$City."'");
                }else{
                    // Insert member data in the database
                    $db->query("INSERT INTO members (name, City, phone, created, modified, status)
                     VALUES ('".$name."', '".$City."', '".$phone."', NOW(), NOW(), '".$status."')");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

// Redirect to the listing page
header("Location: index.php".$qstring);