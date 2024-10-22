<?php

// Constants for prices
define('LARGE_PRICE', 6.00);
define('EXTRA_LARGE_PRICE', 10.00);

$topping_prices = array(
    1 => 1.00,
    2 => 1.75,
    3 => 2.50,
    4 => 3.35
);

define('HST_RATE', 0.13);

// Function to calculate the cost of the pizza based on size and number of toppings
function calculate_pizza_cost($size, $toppings) {
    global $topping_prices;
    
    if ($size == 'large') {
        $base_price = LARGE_PRICE;
    } elseif ($size == 'extra large') {
        $base_price = EXTRA_LARGE_PRICE;
    } else {
        echo "Invalid pizza size.\n";
        return null;
    }
    
    $topping_cost = isset($topping_prices[$toppings]) ? $topping_prices[$toppings] : 0;

    $subtotal = $base_price + $topping_cost;
    $tax = $subtotal * HST_RATE;
    $total = $subtotal + $tax;

    return array($subtotal, $tax, $total);
}

// Main function to handle the user input and display the costs
function main() {
    echo "Welcome to the Pizza Order System!\n";

    // Input for pizza size
    $size = strtolower(readline("Enter the pizza size (large/extra large): "));
    if ($size != 'large' && $size != 'extra large') {
        echo "Invalid pizza size. Please try again.\n";
        return;
    }

    // Input for number of toppings
    $toppings = intval(readline("Enter the number of toppings (1-4): "));
    if ($toppings < 1 || $toppings > 4) {
        echo "Invalid number of toppings. Please try again.\n";
        return;
    }

    // Calculate the costs
    list($subtotal, $tax, $total) = calculate_pizza_cost($size, $toppings);

    // Display the results
    printf("\nSubtotal: $%.2f\n", $subtotal);
    printf("Tax (HST @ 13%%): $%.2f\n", $tax);
    printf("Total: $%.2f\n", $total);
}

// Call the main function to run the program
main();

?>
