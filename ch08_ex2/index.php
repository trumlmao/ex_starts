<?php

//set default values to be used when page first loads
$scores = array();
$scores[0] = 70;
$scores[1] = 80;
$scores[2] = 90;

$sum = '0';


$scores_string = '';
$score_total = '0';
for($i = 0;$i<count($scores);$i++){
    $score_total += $scores[$i];
}
$score_average = 0;
$max_rolls = 0;
$average_rolls = 0;

//take action based on variable in POST array
$action = filter_input(INPUT_POST, 'action');
switch ($action) {
    case 'process_scores':
        $scores = $_POST['scores'];

        // validate the scores
       
        // TODO: Convert this if statement to a for loop
        $isValid = true;

for ($i = 0; $i < 3; $i++) {
    if (empty($scores[$i]) || !is_numeric($scores[$i])) {
        $isValid = false;
        break;
    }
}

if (!$isValid) {
    $scores_string = 'You must enter three valid numbers for scores.';
} else {
    // Process the scores
    $scores_string = implode('|', $scores);
}


        // process the scores
        
        // TODO: Add code that calculates the score total
        
        

        // calculate the average
        $score_average = $score_total / count($scores);
        
        // format the total and average
        $score_total_f = number_format($score_total, 2);
        $score_average_f = number_format($score_average, 2);

        break;
    case 'process_rolls':
        $number_to_roll = filter_input(INPUT_POST, 'number_to_roll', 
                FILTER_VALIDATE_INT);

        $total = 0;
        $count = 0;
        $max_rolls = -INF;
        $rolls = 1;
        // TODO: convert this while loop to a for loop
        for($i=0;$i<10000;$i++){
            if(mt_rand(1,6) != $number_to_roll){
                $rolls++;
            }
        }
        while ($count < 10000) {
            $rolls = 1;
            for (; mt_rand(1, 6) != $number_to_roll; $rolls++) {
               
            }
            $total += $rolls;
            $count++;
            $max_rolls = max($rolls, $max_rolls);
        }
        $average_rolls = $total / $count;

        break;
}
include 'loop_tester.php';
?>