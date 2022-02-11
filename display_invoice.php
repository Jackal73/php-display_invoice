<?php
// 1. get the data from the form and filter input
    $cust_fName = filter_input(INPUT_POST, 'cust_fName');
    $cust_lName = filter_input(INPUT_POST, 'cust_lName');
    $labor_costs = filter_input(INPUT_POST, 'labor_costs',
        FILTER_VALIDATE_FLOAT);
    $parts_cost = filter_input(INPUT_POST, 'parts_cost',
        FILTER_VALIDATE_FLOAT);

// 2. validate user input (not empty, not FALSE, and greater than zero)
    // validate customer name
    if ( empty($cust_fName)) {
        $error_message = 'Please enter a customer First Name.';
    } else if ( !preg_match('/^[a-zA-Z]+$/', $cust_fName)) {
        $error_message = 'Please enter valid characters for First Name.';
    } else if ( empty($cust_lName)) {
        $error_message = 'Please enter a customer Last Name.';
    } else if ( !preg_match('/^[a-zA-Z]+$/', $cust_lName)) {
        $error_message = 'Please enter valid characters for Last Name.';

    // validate labor costs
    } else if ( $labor_costs === null || $labor_costs === FALSE )  {
        $error_message = 'Please enter valid labor costs.';
    } else if ( $labor_costs <= 0 ) {
        $error_message = 'Labor costs must be greater than zero.';

    // validate parts costs
    } else if ( $parts_cost === null || $parts_cost === FALSE ) {
        $error_message = 'Please enter valid parts costs.';
    } else if ( $parts_cost <= 0 ) {
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
    define('TAX_RATE', .0925);
    $subTotal = $parts_cost + $labor_costs;
    $sales_tax = $subTotal * TAX_RATE;
    $total = $subTotal + $sales_tax;
    
// 5. format variables as strings for display as currency and concatenate
//first and last names into one customer name
    $parts_cost_formatted = "$".number_format($parts_cost, 2);
    $labor_costs_formatted = "$".number_format($labor_costs, 2);
    $subTotal_formatted = "$".number_format($subTotal, 2);
    $sales_tax_formatted = "$".number_format($sales_tax, 2);
    $total_formatted = "$".number_format($total, 2);

    $cust_fName_escaped = htmlspecialchars($cust_fName);
    $cust_lName_escaped = htmlspecialchars($cust_lName);

    $f_cust_name = $cust_fName_escaped.' '.$cust_lName_escaped


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
            <span><?php echo htmlspecialchars($f_cust_name); ?></span><br>

            <label>Labor Costs:</label>
            <span><?php echo htmlspecialchars($labor_costs_formatted); ?></span><br>

            <label>Parts Cost:</label>
            <span><?php echo htmlspecialchars($parts_cost_formatted); ?></span><br>

            <label>Subtotal:</label>
            <span><?php echo htmlspecialchars($subTotal_formatted); ?></span><br>

            <label>Sales Tax:</label>
            <span><?php echo htmlspecialchars($sales_tax_formatted); ?></span><br>

            <label>Total:</label>
            <span><?php echo htmlspecialchars($total_formatted); ?></span><br>
        </main>
    </body>
</html>