
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display t_igp Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>t_igp Table Data</h2>
    <table>
        <thead>
            <tr>
                <th>igp_no</th>
                <th>igp_dt</th>
                <th>igp_time</th>
                <th>rr_lr_no</th>
                <th>rr_lr_dt</th>
                <th>chal_no</th>
                <th>chal_dt</th>
                <th>po_typ</th>
                <th>po_no</th>
                <th>itm_cd</th>
                <th>no_pack</th>
                <th>igp_qty</th>
                <th>igp_stat</th>
                <th>cntd_qty</th>
                <th>through</th>
                <th>comm</th>
                <th>comm1</th>
                <th>comm2</th>
                <th>comm3</th>
                <th>comm4</th>
                <th>comm5</th>
                <th>state_up</th>
                <th>hsn_cd</th>
                <th>gstin_no</th>
                <th>comp_scheme</th>
                <th>gst_exempt</th>
                <th>unit_rt</th>
                <th>cgst_pct</th>
                <th>cgst_amt</th>
                <th>sgst_pct</th>
                <th>sgst_amt</th>
                <th>igst_pct</th>
                <th>igst_amt</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require 'db_connect.php';
            // Step 2: Query the database
            $sql = "SELECT * FROM t_igp";
            $stmt = $conn->query($sql);
            $rows = $stmt->fetchAll();
            ?>
                    <?php foreach ($rows as $row): ?> 
                    <tr>
                    <td><?php echo htmlspecialchars($row['igp_no']); ?></td>
                    <td><?php echo htmlspecialchars($row['igp_dt']); ?></td>
                    <td><?php echo htmlspecialchars($row['igp_time']); ?></td>
                    <td><?php echo htmlspecialchars($row['rr_lr_no']); ?></td>
                    <td><?php echo htmlspecialchars($row['rr_lr_dt']); ?></td>
                    <td><?php echo htmlspecialchars($row['chal_no']); ?></td>
                    <td><?php echo htmlspecialchars($row['chal_dt']); ?></td>
                    <td><?php echo htmlspecialchars($row['po_typ']); ?></td>
                    <td><?php echo htmlspecialchars($row['po_no']); ?></td>
                    <td><?php echo htmlspecialchars($row['itm_cd']); ?></td>
                    <td><?php echo htmlspecialchars($row['no_pack']); ?></td>
                    <td><?php echo htmlspecialchars($row['igp_qty']); ?></td>
                    <td><?php echo htmlspecialchars($row['igp_stat']); ?></td>
                    <td><?php echo htmlspecialchars($row['cntd_qty']); ?></td>
                    <td><?php echo htmlspecialchars($row['through']); ?></td>
                    <td><?php echo htmlspecialchars($row['comm']); ?></td>
                    <td><?php echo htmlspecialchars($row['comm1']); ?></td>
                    <td><?php echo htmlspecialchars($row['comm2']); ?></td>
                    <td><?php echo htmlspecialchars($row['comm3']); ?></td>
                    <td><?php echo htmlspecialchars($row['comm4']); ?></td>
                    <td><?php echo htmlspecialchars($row['comm5']); ?></td>
                    <td><?php echo htmlspecialchars($row['state_up']); ?></td>
                    <td><?php echo htmlspecialchars($row['hsn_cd']); ?></td>
                    <td><?php echo htmlspecialchars($row['gstin_no']); ?></td>
                    <td><?php echo htmlspecialchars($row['comp_scheme']); ?></td>
                    <td><?php echo htmlspecialchars($row['gst_exempt']); ?></td>
                    <td><?php echo htmlspecialchars($row['unit_rt']); ?></td>
                    <td><?php echo htmlspecialchars($row['cgst_pct']); ?></td>
                    <td><?php echo htmlspecialchars($row['cgst_amt']); ?></td>
                    <td><?php echo htmlspecialchars($row['sgst_pct']); ?></td>
                    <td><?php echo htmlspecialchars($row['sgst_amt']); ?></td>
                    <td><?php echo htmlspecialchars($row['igst_pct']); ?></td>
                    <td><?php echo htmlspecialchars($row['igst_amt']); ?></td>
                    
                    </tr>    
                    <?php endforeach; ?> 
        </tbody>
    </table>
</body>
</html>
