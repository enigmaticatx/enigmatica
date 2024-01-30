<?php
session_start();
if (!isset($_SESSION['puzzle1_completed'])) {
    header('Location: index.html'); // Redirect to Puzzle 1
    exit;
}
$correctPasswords = ['AdAstra', 'Ad Astra', 'adastra', 'ad astra', 'Macte nova virtute, puer: sic itur ad astra, dis genite et geniture deos', 'macte nova virtute, puer: sic itur ad astra, dis genite et geniture deos', 'Macte nova virtute puer sic itur ad astra dis genite et geniture deos', 'macte nova virtute puer sic itur ad astra dis genite et geniture deos']; // Array of correct passwords

// Check if the data is sent via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if password field is set and not empty
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $userPassword = $_POST['password'];

        // Sanitize the user input
        $userPassword = filter_var($userPassword, FILTER_SANITIZE_STRING);

        // Password check
        if (in_array($userPassword, $correctPasswords)) {
            $_SESSION['puzzle2_completed'] = true;
            header('Location: indovinello_3.html');
            exit;
        } else {
            // Redirect to index.html with an error message
            header('Location: indovinello_2.html?error=incorrect');
            exit;
        }
    }
} else {
    // Redirect back to the form if the request method is not POST
    header('Location: indovinello_2.html');
    exit;
}
?>