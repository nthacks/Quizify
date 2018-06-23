<?php
// Include config file
require_once 'config.php';

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Subject"]) || empty($_POST["Question"]) || empty($_POST["Correct_Answer"]) || empty($_POST["Wrong_Answer_1"])) {
        $stmt->close();
        $mysqli->close();
        die("Invalid Request");
    }
    // Prepare an insert statement
    $sql = "INSERT INTO `qb`(`subject`, `question`, `correct`, `wrong1`, `wrong2`, `wrong3`) VALUES (?,?,?,?,?,?)";
    if ($stmt = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ssssss", $subject, $question, $correct, $wrong1, $wrong2, $wrong3);
        $subject = $_POST["Subject"] ?? NULL;
        $question = $_POST["Question"] ?? NULL;
        $correct = $_POST["Correct_Answer"] ?? NULL;
        $wrong1 = $_POST["Wrong_Answer_1"] ?? NULL;
        $wrong2 = $_POST["Wrong_Answer_2"] ?? NULL;
        $wrong3 = $_POST["Wrong_Answer_3"] ?? NULL;

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            $stmt->close();
            $mysqli->close();
            header("location: /index.php");
            exit();
        } else {
            $stmt->close();
            $mysqli->close();
            die("Query could not be executed");
        }
    }
}
?>
