<?php

// Handle POST request to create a new address for a contact
function createAddress($contactId, $requestData) {
    // Your logic to create a new address for the contact with ID $contactId
    // $requestData will contain data sent in the request body
    // Example: $requestData['street'], $requestData['city'], etc.
    
    // Assume address is created successfully
    $response = [
        'data' => [
            'id' => 1, // Example ID
            'street' => $requestData['street'],
            'city' => $requestData['city'],
            'province' => $requestData['province'],
            'country' => $requestData['country'],
            'postal_code' => $requestData['postal_code']
        ]
    ];

    http_response_code(201);
    echo json_encode($response);
}

// Handle GET request to retrieve a list of addresses for a contact
function listAddresses($contactId) {
    // Your logic to retrieve a list of addresses for the contact with ID $contactId
    // Dummy data for demonstration
    $addresses = [
        [
            'id' => 1,
            'street' => '123 Main St',
            'city' => 'Springfield',
            'province' => 'State',
            'country' => 'USA',
            'postal_code' => '12345'
        ],
        [
            'id' => 2,
            'street' => '456 Elm St',
            'city' => 'Springfield',
            'province' => 'State',
            'country' => 'USA',
            'postal_code' => '67890'
        ]
    ];

    $response = [
        'data' => $addresses
    ];

    http_response_code(200);
    echo json_encode($response);
}

// Handle GET request to retrieve a specific address for a contact
function getAddress($contactId, $addressId) {
    // Your logic to retrieve the address with ID $addressId for the contact with ID $contactId
    // Dummy data for demonstration
    $address = [
        'id' => $addressId,
        'street' => '123 Main St',
        'city' => 'Springfield',
        'province' => 'State',
        'country' => 'USA',
        'postal_code' => '12345'
    ];

    $response = [
        'data' => $address
    ];

    http_response_code(200);
    echo json_encode($response);
}

// Handle PUT request to update an address for a contact
function updateAddress($contactId, $addressId, $requestData) {
    // Your logic to update the address with ID $addressId for the contact with ID $contactId
    // $requestData will contain data sent in the request body
    // Example: $requestData['street'], $requestData['city'], etc.
    
    // Assume address is updated successfully
    $response = [
        'data' => [
            'id' => $addressId,
            'street' => $requestData['street'],
            'city' => $requestData['city'],
            'province' => $requestData['province'],
            'country' => $requestData['country'],
            'postal_code' => $requestData['postal_code']
        ]
    ];

    http_response_code(200);
    echo json_encode($response);
}

// Handle DELETE request to delete an address for a contact
function deleteAddress($contactId, $addressId) {
    // Your logic to delete the address with ID $addressId for the contact with ID $contactId
    // Assume address is deleted successfully

    $response = [
        'data' => true
    ];

    http_response_code(200);
    echo json_encode($response);
}

// Main entry point for the API
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contactId = $_GET['idContact'];
    $requestData = json_decode(file_get_contents('php://input'), true);
    createAddress($contactId, $requestData);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['idAddress'])) {
        $contactId = $_GET['idContact'];
        $addressId = $_GET['idAddress'];
        getAddress($contactId, $addressId);
    } else {
        $contactId = $_GET['idContact'];
        listAddresses($contactId);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $contactId = $_GET['idContact'];
    $addressId = $_GET['idAddress'];
    $requestData = json_decode(file_get_contents('php://input'), true);
    updateAddress($contactId, $addressId, $requestData);
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $contactId = $_GET['idContact'];
    $addressId = $_GET['idAddress'];
    deleteAddress($contactId, $addressId);
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
}

?>
