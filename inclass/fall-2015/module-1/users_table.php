<?php

$users = array(
    array(
        'id' => 123,
        'name' => 'Samir',
        'location' => 'Austin'
    ),
    array(
        'id' => 789,
        'name' => 'Chris',
        'location' => 'Austin'
    )
);
?>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Location</th>
        </tr>
        <?php

        foreach ($users as $index => $user) {

            // % aka. modulus operator
            if ($index % 2 == 0) {
                echo '<tr>';
            } else {
                echo '<tr style="background-color:grey;">';
            }

            echo '<td>' . $user['id'] . '</td>';
            echo '<td>' . $user['name'] . '</td>';
            echo '<td>' . $user['location'] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
<?php

// 1. Create a HTML table from this data that looks
// like this -------------------------------------->
// 2. (opt) Stripe each row a different color
?>