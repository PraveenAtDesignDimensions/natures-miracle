<?php
$name = $_POST["name"];
$company = $_POST["company"];
$address = $_POST["address"];
$email = $_POST["email"];
$subjects = $_POST["subject"];
$landline = $_POST["landline"];
$phone = $_POST["phone"];
$radio = $_POST["radio"];
$requirement = $_POST["requirement"];


$EmailTo = "praveenpal4232@gmail.com";
$Subject = "A HoReCa Query From natures-miracle.in ";

// prepare email body text
$Fields .= "Name: ";
$Fields .= $name;
$Fields .= "\n";

$Fields .= "Company: ";
$Fields .= $company;
$Fields .= "\n";

$Fields .= "Address: ";
$Fields .= $address;
$Fields .= "\n";


$Fields.= "Email: ";
$Fields .= $email;
$Fields .= "\n";

$Fields .= "Subjects: ";
$Fields .= $subjects;
$Fields .= "\n";

$Fields .= "Phone: ";
$Fields .= $phone;
$Fields .= "\n";

$Fields .= "Landline: ";
$Fields .= $landline;
$Fields .= "\n";

$Fields .= "Business: ";
$Fields .= $radio;
$Fields .= "\n";

$Fields .= "Requirement: ";
$Fields .= $requirement;
$Fields .= "\n";


// Checks if form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6Lf6BqoUAAAAADFCqgR9d-mU7QqkJEEwGEdcnSgt',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        // What happens when the CAPTCHA wasn't checked
        header("Location: ../sorry.html");
    } else {
        // If CAPTCHA is successfully completed...

        // Paste mail function or whatever else you want to happen here!
        
        // send email
        $success = mail($EmailTo,  $Subject,  $Fields, "From:".$email);
        header("Location: ../thanks.html");
    }
}

else { }

?>