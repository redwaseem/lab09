<?php
require_once "settings.php";

$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

if ($dbconn) {
    $query  = "SELECT * FROM cars";
    $result = mysqli_query($dbconn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Start with the table headings
            echo "<table border='1'>";
            echo "<tr>
                    <th>Car ID</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Year of Manufacture</th>
                  </tr>";

            // Snippet from the handout
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['car_id'] . "</td>";
                echo "<td>" . $row['make'] . "</td>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['yom'] . "</td>";
                echo "</tr>";
            }

            // Close the table tag
            echo "</table>";
        } else {
            echo "<p>There are no cars to display.</p>";
        }

        mysqli_free_result($result);
    } else {
        echo "<p>Something is wrong with the query.</p>";
    }

    mysqli_close($dbconn);
} else {
    echo "<p>Unable to connect to the db.</p>";
}
?>