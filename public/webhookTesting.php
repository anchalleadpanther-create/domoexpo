<?php


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        header('Content-Type: application/json');
        
        $rawData = file_get_contents("php://input");
        
        $data = json_decode($rawData, true);
        
        if (json_last_error() === JSON_ERROR_NONE) {
            // echo "Webhook Received:\n";
            // print_r($data);
            echo json_encode([
                'status' => 'success',
                'message' => 'Webhook Received Successfully.',
                'data' => $data
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid JSON received'
            ]);
        }
        
    }else{
        echo json_encode([
            'status' => 'error',
            'message' => 'Only POST method is accepted'
        ]);
    }
    
    
?>
