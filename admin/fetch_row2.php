<?php
// get_questions.php

include('conn.php');
// echo"reached";
if (isset($_GET['audioId'])) {
    $audioId = $_GET['audioId'];

    $s1 = "SELECT * FROM tbl_questions3 WHERE audio_id='$audioId'";
    $r1 = $conn->query($s1);

    if ($r1->num_rows > 0) {
        $i = 1;?>
        <?php

        while ($ro = $r1->fetch_assoc()) {
            $qid = $ro['question_id'];
            ?>
            <tr>
                <td><b><?php echo $i; ?></b></td>
                <td><?php echo $ro['paragraph']; ?></td>
                <td class="table-success">
                    <?php
                    $s2 = "SELECT * FROM `tbl_options3` WHERE question_id='$qid'";
                    $r2 = $conn->query($s2);

                    if ($r2 && $r2->num_rows > 0) {
                        $options = $r2->fetch_all(MYSQLI_ASSOC);

                        for ($j = 0; $j < min(3, count($options)); $j++) {
                            echo "{$options[$j]['answer_text']}<br>";
                        }
                    } else {
                        for ($j = 0; $j < 3; $j++) {
                            echo "No option<br>";
                        }
                    }
                    ?>
                </td>
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
