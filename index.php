<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 12/12/17
 * Time: 17:07
 */
$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);

    $text = $json->result->parameters->text;

    switch ($text) {
        case 'hi':
            $speech = "Hi, Nice to meet you";
            break;

        case 'bye':
            $speech = "Bye, good night";
            break;

        case 'anything':
            $speech = "Yes, you can type anything here.";
            break;

        case 'comment on fait':
            $speech = "Débrouille toi !!";
            break;

        case 'c est quoi un sushi?':
            $speech = "c'est de la merde";

        default:
            $speech = "Sorry, I didnt get that. Please ask me something else.";
            break;
    }

    $response = new \stdClass();
    $response->speech = $speech;
    $response->displayText = $speech;
    $response->source = "webhook";
    echo json_encode($response);
}
else
{
    echo "Method not allowed";
}

?>