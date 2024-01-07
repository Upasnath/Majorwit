<?php
// get_questions.php

include('conn.php');
// echo"reached";
if (isset($_GET['audioId'])) {
    $audioId = $_GET['audioId'];

    $s1 = "SELECT * FROM tbl_questions WHERE audio_id='$audioId'";
    $r1 = $conn->query($s1);

    if ($r1->num_rows > 0) {
        $i = 1;?>
            <thead class="table-danger">
                <tr>
                    <th>Sl.no.</th>
                    <th>Question</th>
                    <th>Option A</th>
                    <th>Option B</th>
                    <th>Option C</th>
                    <th class="table-success">Correct Answer</th>
                </tr>
            </thead>
        <?php

        while ($ro = $r1->fetch_assoc()) {
            $qid = $ro['question_id'];
            ?>
            <tr>
                <td><b><?php echo $i; ?></b></td>
                <td><?php echo $ro['question_text']; ?></td>
                <?php
                $s2 = "SELECT * FROM `tbl_options` WHERE question_id='$qid'";
                $r2 = $conn->query($s2);

                if ($r2 && $r2->num_rows > 0) {
                    // Fetch all rows into a PHP array
                    $options = $r2->fetch_all(MYSQLI_ASSOC);

                    // Display options, assuming there are three options
                    for ($j = 0; $j < min(3, count($options)); $j++) {
                        echo "<td>{$options[$j]['option_text']}</td>";
                    }
                } else {
                    // Handle the case where there are no options
                    for ($j = 0; $j < 3; $j++) {
                        echo "<td>No option</td>";
                    }
                }
                ?>
                <td><?php echo $ro['correct_answer']; ?></td>
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
