<?php
//set default values
$name = '';
$email = '';
$phone = '';
$message = 'Enter some data and click on the Submit button.';

//process
$action = filter_input(INPUT_POST, 'action');

switch ($action) {
    case 'process_data':
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
        $test = '';

        /*************************************************
         * validate and process the name
         ************************************************/
        if (isset($name)===FALSE) {
            $test ='false';
            
        }else{
            $nameaf = ucwords($name);
            $nameParts = explode(" ", $nameaf);
            $firstName = $nameParts[0];
            $firstName = ucfirst(strtolower($firstName));
            
        }
        // 1. make sure the user enters a name
        // 2. display the name with only the first letter capitalized

        /*************************************************
         * validate and process the email address
         ************************************************/
        if (isset($email)) {
            if (strpos($email, '@') === false || strpos($email, '.') === false) {
                $test = 'false';
                
            }
        }
        
        // 2. make sure the email address has at least one @ sign and one dot character

        /*************************************************
         * validate and process the phone number
         ************************************************/
        // 1. make sure the user enters at least seven digits, not including formatting characters
        // 2. format the phone number like this 123-4567 or this 123-456-7890
        $phone = "1234567890"; // Replace with your actual phone number

if (!is_numeric($phone) || strlen($phone) < 7 || strlen($phone) > 12) {
    $test = 'false';
    
} else {
    // Format the phone number
    $phone = preg_replace("/^(\d{3})(\d{4})(\d{0,4})$/", "$1-$2-$3", $phone);

    // Output the formatted phone number
    
}

        /*************************************************
         * Display the validation message
         * $message = "Hello ".$firstName ."/n".
         ************************************************/
        if($test !== "false"){
            $message = "Hello ".$firstName ."\n".
                        "Thank you for entering this data:\n".
                        "Name: ".$nameaf."\n".
                        "Email: ".$email."\n".
                        "Phone: ".$phone
            
            ;
        }else{
            $message ="PLS check info before submit";
        }
        

        break;
}
include 'string_tester.php';
?>