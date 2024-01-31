<?php
session_start();
if (!isset($_SESSION['puzzle_7_completed'])) {
    header('Location: index.html'); // Redirect to Puzzle 1
    exit;
}
$correctPasswords = ['Valetta', 'valetta']; // Array of correct passwords

// Check if the data is sent via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if password field is set and not empty
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $userPassword = $_POST['password'];

        // Sanitize the user input
        $userPassword = filter_var($userPassword, FILTER_SANITIZE_STRING);

        // Password check
        if (in_array($userPassword, $correctPasswords)) {
            $_SESSION['puzzle_7_completed'] = true;
            header('Location: success.html');
            exit;
        } else {
            // Redirect to index.html with an error message
            header('Location: puzzle_7.html?error=incorrect');
            exit;
        }
    }
} else {
    // Redirect back to the form if the request method is not POST
    header('Location: puzzle_7.html');
    exit;
}
?>