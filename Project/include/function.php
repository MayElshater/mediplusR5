<?php
function updateViewersCount($conn, $photo_id) {
    try {
        // Increment viewers count for the specific photo in the database
        $sql = "UPDATE photos SET viewers = viewers + 1 WHERE id = ?"; 
        $stmt = $conn->prepare($sql);
        $stmt->execute([$photo_id]);

        // Fetch the updated viewers count for the specific photo
        $sqlview = "SELECT viewers FROM photos WHERE id = ?"; 
        $stmtview = $conn->prepare($sqlview);
        $stmtview->execute([$photo_id]);
        $row = $stmtview->fetch(PDO::FETCH_ASSOC);
        $viewers_count = $row['viewers'];

        // Return the updated viewers count
        return $viewers_count;
    } catch(PDOException $e) {
        // Handle the exception if needed
        $errMsg =  $e->getMessage();
    }
}
?>
