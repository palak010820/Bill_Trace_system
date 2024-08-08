<?php
session_start();
require_once('db_connect.php');

// Function to fetch total counts from database
function getTotalCount1($conn, $column) {
    $stmt = $conn->prepare("SELECT COUNT(igp_no) AS total FROM t_igp");
    // $stmt->bindParam($column);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}
function getTotalCount2($conn, $column) {
    $stmt = $conn->prepare("SELECT count(t_igp.igp_no) as t1
    FROM t_igp
    LEFT JOIN t_mis ON t_igp.igp_no = t_mis.igp_no
    WHERE t_mis.igp_no IS NULL"
    );
    // $stmt->bindParam($column);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['t1'];
}
function getTotalCount21($conn, $column) {
    $stmt = $conn->prepare("SELECT COUNT(rv_no) AS total FROM t_mis where rv_no is null or rv_no =''");
    // $stmt->bindParam($column);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}
function getTotalCount22($conn, $column) {
    $stmt = $conn->prepare("SELECT COUNT(*)as total FROM t_mis WHERE insp_dt IS NULL or insp_dt = ''");
    // $stmt->bindParam($column);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

$total_igp_generated = getTotalCount1($conn, 'igp_no');
$total_mis_pending = getTotalCount2($conn, 'mis_no');


$rv = getTotalCount21($conn, 'rv_no');
$insp = getTotalCount22($conn, 'insp_no');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .button-container {
            margin-top: 20px;
            margin-left: 124px;
            padding-block: 20px;
            display: flex;
            justify-content: center;
        }
        .btn-rectangle {
            width: 340px;
            height: 75px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            border-radius: 1000;
        }
        .hidden {
            display: none;
            margin-left: 0px;
        }
        body {
            background-image: url("R.jpg");
            background-repeat: no-repeat;
            background-position:top right;
            background-size: auto;
        }
    </style>
</head>
<body>
    <img src="logo2.jpg" alt="Gliders India Limited" style="width:25%">
    <div class="container">
        <h1 class="text-center my-4"><u>DASHBOARD</u></h1>
        <div class="row">
            <div class="col-md-4 button-container">
                <a href="igp.php">
                <button class="btn btn-primary btn-rectangle"><?php echo "Total igp generated: " . $total_igp_generated; ?></button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 button-container">
                <button  class="btn btn-success btn-rectangle" id="mis"><?php echo "Total mis pending: " . $total_mis_pending; ?></button>
            </div>
            <div class="col-md-4 button-container">
                <button class="btn btn-danger btn-rectangle" id="faButton">F&A</button>
            </div>
        </div>
        <div class="row hidden" id="misdetails">
            <div class="col-md-4 button-container">
                <a href="rv_pending.php">
                <button class="btn btn-info btn-rectangle"><?php echo "total rv no pending : " . $rv; ?></button>
                </a>
            </div>
            <div class="col-md-4 button-container">
                <a href="insp_pend.php">
                <button class="btn btn-info btn-rectangle"><?php echo "total inspected date pending: " . $insp; ?></button>
                </a>
            </div>
            <div class="col-md-4 button-container">
                <a href="missed_mis.php">
                <button class="btn btn-info btn-rectangle"><?php echo "pending mis details" ?></button>
                </a>
            </div>
            
        </div>
        <div class="row hidden" id="faDetails">
            <div class="col-md-6 button-container">
                <button class="btn btn-dark btn-rectangle"><?php echo "Total Pending Bills: " . $totalPendingBills; ?></button>
            </div>
            <div class="col-md-6 button-container">
                <button class="btn btn-dark btn-rectangle"><?php echo "Total Approved Bills: " . $totalApprovedBills; ?></button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#mis').click(function() {
                $('#misdetails').toggleClass('hidden');
            });
            $('#faButton').click(function() {
                $('#faDetails').toggleClass('hidden');
            });
        });
    </script>
</body>
</html>
