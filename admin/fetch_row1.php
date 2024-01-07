<?php
// get_questions.php

include('conn.php');
// echo"reached";
if (isset($_GET['audioId'])) {
    $audioId = $_GET['audioId'];

    $s1 = "SELECT * FROM tbl_questions2 WHERE audio_id='$audioId'";
    $r1 = $conn->query($s1);

    if ($r1->num_rows > 0) {
        $i = 1;?>
        <?php

        while ($ro = $r1->fetch_assoc()) {
            $qid = $ro['question_id'];
            ?>
            <tr>
                <td><b><?php echo $i; ?></b></td>
                <td><?php echo $ro['question_text']; ?></td>
                <?php
                $s2 = "SELECT * FROM `tbl_options2` WHERE question_id='$qid'";
                $r2 = $conn->query($s2);

                if ($r2 && $r2->num_rows > 0) {
                    // Fetch all rows into a PHP array
                    $options = $r2->fetch_all(MYSQLI_ASSOC);

                    // Display options, assuming there are four options
                    for ($j = 1; $j <= 4; $j++) {
                        // Check if the option exists, otherwise display "No option"
                        $optionText = isset($options[0]['option_text'.$j]) ? $options[0]['option_text'.$j] : "No option";
                        echo "<td>{$optionText}</td>";
                    }
                } else {
                    // Handle the case where there are no options
                    for ($j = 0; $j < 4; $j++) {
                        echo "<td>No option</td>";
                    }
                }
                ?>
                <td><?php echo $ro['correct_answer1']; ?></td>
                <td><?php echo $ro['correct_answer2']; ?></td>
            </tr>
            <?php
            $i++;
        }
    } else {
        echo "<tr><td colspan='6'>0 results</td></tr>";
    }
} else {
    // Handle the case where audioId is not set
    echo "Error: audioId not set";
}
?>
