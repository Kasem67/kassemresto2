<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the team member details based on the provided id
    $sql = "SELECT * FROM displayteam WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fname = $row['fname'];
        $jobtype = $row['jobtype'];
        // Add more fields as per your table structure

        // Display the edit form
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Team Member</title>
        </head>
        <body>
            <h1>Edit Team Member</h1>
            <form action="update_member.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="fname">First Name:</label>
                <input type="text" name="fname" value="<?php echo $fname; ?>"><br><br>
                <label for="jobtype">Job Type:</label>
                <input type="text" name="jobtype" value="<?php echo $jobtype; ?>"><br><br>
                <!-- Add more fields as per your table structure -->
                <button type="submit">Update</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Team member not found.";
    }
} else {
    echo "Invalid request.";
}
?>