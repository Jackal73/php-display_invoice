<!--set default value of variables for initial page load-->
<?php
    if (!isset($cust_fName)) {$cust_fName = '';}
    if (!isset($cust_lName)) {$cust_lName = '';}
    if (!isset($labor_costs)) {$labor_costs = '';}
    if (!isset($parts_cost)) {$parts_cost = '';}
?>
<!--don't forget to save the file as index.php when done-->
<!DOCTYPE html>
<html>
    <head>
        <title>Invoice Calculator</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>

    <body>
        <main>
            <h1>Dooley's Automotive</h1>
            <!--insert if statement to display $error_message if it's not empty-->
            <?php if (!empty($error_message)) { ?>
                <p class="error"><?php echo htmlspecialchars($error_message); ?>
                </p>
            <?php } ?>
            
            <form action="display_invoice.php" method="post">

                <div id="data">
                    <label>Customer First Name:</label>
                    <input type="text" name="cust_fName"
                           value="<?php echo htmlspecialchars($cust_fName); ?>">
                    <br>

                    <label>Customer Last Name:</label>
                    <input type="text" name="cust_lName"
                           value="<?php echo htmlspecialchars($cust_lName); ?>">
                    <br>

                    <label>Labor Costs:</label>
                    <input type="text" name="labor_costs"
                           value="<?php echo htmlspecialchars($labor_costs); ?>">
                    <br>

                    <label>Parts Cost:</label>
                    <input type="text" name="parts_cost"
                           value="<?php echo htmlspecialchars($parts_cost); ?>">
                    <br>
                </div>

                <div id="buttons">
                    <label>&nbsp;</label>
                    <input type="submit" value="Display Invoice"><br>
                </div>

            </form>
        </main>
    </body>
</html>