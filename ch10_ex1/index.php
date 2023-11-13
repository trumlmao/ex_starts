<?php
//set default value
$message = '';
$test = '';

//get value from POST array
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action =  'start_app';
}

//process
switch ($action) {
    case 'start_app':

        // set default invoice date 1 month prior to current date
        $interval = new DateInterval('P1M');
        $default_date = new DateTime();
        $default_date->sub($interval);
        $invoice_date_s = $default_date->format('n/j/Y');

        // set default due date 2 months after current date
        $interval = new DateInterval('P2M');
        $default_date = new DateTime();
        $default_date->add($interval);
        $due_date_s = $default_date->format('n/j/Y');

        $message = 'Enter two dates and click on the Submit button.';
        break;
    case 'process_data':
        $invoice_date_s = filter_input(INPUT_POST, 'invoice_date');
$due_date_s = filter_input(INPUT_POST, 'due_date');


if (!$invoice_date_s || !$due_date_s) {
    echo "Please enter both invoice date and due date.";
    
    exit;
}


try {
    $invoice_date = new DateTime($invoice_date_s);
    $due_date = new DateTime($due_date_s);
} catch (Exception $e) {
    echo "Invalid date format: " . $e->getMessage();
    
    exit;
}


if ($due_date < $invoice_date) {
    echo "Due date must be after the invoice date.";
    
    exit;
}


$invoice_date_f = $invoice_date->format('Y-m-d');
$due_date_f = $due_date->format('Y-m-d');


$current_date = new DateTime();
$current_date_f = $current_date->format('Y-m-d');
$current_time_f = $current_date->format('H:i:s');


$interval = $current_date->diff($due_date);
$years = $interval->y;
$months = $interval->m;
$days = $interval->d;
if ($due_date < $current_date) {
    $due_date_message = "This invoice is ". "$years years, $months months, and $days days "."overdue.";
} else {
    $due_date_message = "This invoice is due in "."$years years, $months months, and $days days.";
}

break;
}
include 'date_tester.php';
?>