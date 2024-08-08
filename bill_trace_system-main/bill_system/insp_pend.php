<?php
require 'db_connect.php';
$sql = ("SELECT mis_no , mis_dt FROM t_mis WHERE insp_dt IS NULL or insp_dt = ''");
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
        <h1 class="mt-4 mb-4">Pending Data of mis whose insp_dt is not generated</h1>
        <table class="table table-bordered" style="width:1%">
            <thead>
                <tr>
                <th>mis_no</th>
                <th>mis_dt</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row): ?>
                <tr>
                <td><?php echo htmlspecialchars($row['mis_no']); ?></td>
                <td><?php echo htmlspecialchars($row['mis_dt']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>