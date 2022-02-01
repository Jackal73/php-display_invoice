<?php
// 1. get the data from the form and filter input
    $cust_fName = filter_input(INPUT_POST, 'cust_fName');
    $cust_lName = filter_input(INPUT_POST, 'cust_lName');
    $labor_costs = filter_input(INPUT_POST, 'labor_costs',
        FILTER_VALIDATE_FLOAT);
    $parts_costs = filter_input(INPUT_POST, 'parts_costs',
        FILTER_VALIDATE_FLOAT);

// 2. validate user input (not empty, not FALSE, and greater than zero)
    // validate customer name
    if (cust_fName === null ) {
        $error_message = 'Please enter customer first name.';
    } else if (cust_lName === null ) {
        $error_message = 'Please enter customer last name.';

    // validate labor costs
    } else if ( $labor_costs === null || $labor_costs === false )  {
        $error_message = 'Please enter valid labor costs.';
    } else if ( $labor_costs <= 0 ) {
        $error_message = 'Labor costs must be greater than zero.';

    // validate parts costs
    } else if ( $parts_costs === null || $parts_costs === FALSE ) {
        $error_message = 'Please enter valid parts costs.';
    } else if ( $parts_costs <= 0 ) {
    $error_message = 'Parts costs must be greater than zero.';

    // set error message to empty string if no invalid entries
    } else {
        $error_message = '';
    }

// 3. if loop to call index.php when error message is not empty
    if ($error_message != '') {
        include('index.php');
        exit();
    }
// 4. do the math (use the define function to create a constant called TAX_RATE)

// 5. format variables as strings for display as currency and concatenate
//first and last names into one customer name

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Invoice Calculator</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <main>
            <h1>Dooley's Automotive</h1>

            <label>Customer's Name:</label>
            <span><?php echo 'statement goes here'; ?></span><br>

            <label>Labor Costs:</label>
            <span><?php echo 'statement goes here'; ?></span><br>

            <label>Parts Cost:</label>
            <span><?php echo 'statement goes here'; ?></span><br>

            <label>Subtotal:</label>
            <span><?php echo 'statement goes here'; ?></span><br>

            <label>Sales Tax:</label>
            <span><?php echo 'statement goes here'; ?></span><br>

            <label>Total:</label>
            <span><?php echo 'statement goes here'; ?></span><br>
        </main>
    </body>
</html>