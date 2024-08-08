<?php
require 'db_connect.php';

$sql = ("SELECT t_igp.igp_no , igp_dt
FROM t_igp
LEFT JOIN t_mis ON t_igp.igp_no = t_mis.igp_no
WHERE t_mis.igp_no IS NULL"
);
$stmt = $conn->query($sql);
$rows = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>pending details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Pending Data of igp whose mis is not generated</h1>
        <table class="table table-bordered" style="width:1%">
            <thead>
                <tr>
                    <th>igp_no</th>
                    <th>igp_dt</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['igp_no']); ?></td>
                    <td><?php echo htmlspecialchars($row['igp_dt']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
