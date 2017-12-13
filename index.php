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
            $speech = "<iframe
  width=\"600\"
  height=\"450\"
  frameborder=\"0\" style=\"border:0\"
  src=\"https://www.google.com/maps/embed/v1/place?key=YOUR_API_KEY
    &q=Space+Needle,Seattle+WA\" allowfullscreen>
</iframe>";
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

        case 'quoi un sushi':
            $speech = "c est de la merde";
            break;

        case 'prout':
            $speech = "Hackathon !!";
            break;

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