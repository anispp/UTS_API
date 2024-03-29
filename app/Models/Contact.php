<?php

// Handle POST request to create a new contact
function createContact($requestData) {
    // Your logic to create a new contact
    // $requestData will contain data sent in the request body
    // Example: $requestData['first_name'], $requestData['last_name'], etc.
    
    // Assume contact is created successfully
    $response = [
        'data' => [
            'id' => 1, // Example ID
            'first_name' => $requestData['first_name'],
            'last_name' => $requestData['last_name'],
            'email' => $requestData['email'],
            'phone' => $requestData['phone']
        ]
    ];

    http_response_code(201);
    echo json_encode($response);
}

// Handle GET request to search for contacts
function searchContacts($queryParams) {
    // Your logic to search for contacts
    // $queryParams will contain query parameters like 'name', 'phone', etc.
    
    // Dummy data for demonstration
    $contacts = [
        [
            'id' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890'
        ],
        [
            'id' => 2,
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'email' => 'jane@example.com',
            'phone' => '9876543210'
        ]
    ];

    $response = [
        'data' => $contacts
    ];

    http_response_code(200);
    echo json_encode($response);
}

// Handle PUT request to update a contact
function updateContact($contactId, $requestData) {
    // Your logic to update the contact with ID $contactId
    // $requestData will contain data sent in the request body
    // Example: $requestData['first_name'], $requestData['last_name'], etc.
    
    // Assume contact is updated successfully
    $response = [
        'data' => [
            'id' => $contactId,
            'first_name' => $requestData['first_name'],
            'last_name' => $requestData['last_name'],
            'email' => $requestData['email'],
            'phone' => $requestData['phone']
        ]
    ];

    http_response_code(200);
    echo json_encode($response);
}

// Handle DELETE request to delete a contact
function deleteContact($contactId) {
    // Your logic to delete the contact with ID $contactId
    // Assume contact is deleted successfully

    $response = [
        'data' => true
    ];

    http_response_code(200);
    echo json_encode($response);
}

// Main entry point for the API
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = json_decode(file_get_contents('php://input'), true);
    createContact($requestData);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $queryParams = $_GET;
    searchContacts($queryParams);
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $contactId = $_GET['id'];
    $requestData = json_decode(file_get_contents('php://input'), true);
    updateContact($contactId, $requestData);
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $contactId = $_GET['id'];
    deleteContact($contactId);
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
}

?>
