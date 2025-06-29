<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/ui.css">
    <link rel="stylesheet" type="text/css" href="../print.css">
    <script src="../print.js"></script>
    <style type="text/css">
        #data td:nth-child(1) {
            background: ;
            padding-left: 30px;
        }

        .widget-container {
            width: 50%;
            height: 100%;
            background-color: aqua;
        }

        .reportContainer {
            width: 210mm;
            height: 297mm;
            margin: 0 auto;
            padding: 0px;
            border: 1px solid lightgrey;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
            background-color: white;

        }
    </style>

    <title>Certificate - <?php echo $_GET['id']; ?></title>
</head>

<body>


    <?php @include '../nav/app_header_nav.php';
    include '../nav/global_nav.php'; ?>


    <br><br>
    <div class="pageName card-heading">
        <table border="0">
            <tr>
                <td width="40%">
                    <h3>CERTIFICATE PRINTING</h3>
                </td>
            </tr>
        </table>
    </div>
    <br>

    <?php require_once '../printNav.php'; ?>


    <div class="widget-container" id="reportContainer">
        <div class=" reportContainer ">
            <div class="reportContent">
                <div id="showHeader">
                    <?php include '../prefrences/letterHead_header.php'; ?>
                </div>
                <div id="letterHeadSpace" style=" height: 126px; display: none !important;"></div>
                <br>
                <div
                    style="text-align: center; font-size: 29px; font-style: italic; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                    Certificate of Baptism</div>
                <br>
                <?php
                include '../config/connection.php';
                $id = $_GET['id'];
                $sql = "SELECT * FROM baptism WHERE reg_no = '$id'";
                $result = $conn->query($sql);
                while ($rows = $result->fetch_assoc()) {
                    $recordOf = $rows['name'] . ' ' . $rows['surname'];


                    ?>

                    <table class="certificateData" id="printContent" width="100%" border="0" cellpadding="0"
                        cellspacing="13" style="margin-left: 50px;">
                        <tr>
                            <td width="5%">1.</td>
                            <td width="20%">Registration No</td>
                            <td width="4px">:</td>
                            <td><?php echo $rows['reg_no']; ?></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Date of baptism</td>
                            <td>:</td>
                            <td><?php echo $rows['baptism_date']; ?></td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Date of birth</td>
                            <td>:</td>
                            <td><?php echo $rows['dob']; ?></td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>Sex</td>
                            <td>:</td>
                            <td><?php echo $rows['gender']; ?></td>
                        </tr>
                        <tr>
                            <td>5.</td>
                            <td>Name</td>
                            <td>:</td>
                            <td><?php echo $rows['name']; ?></td>
                        </tr>
                        <tr>
                            <td>6.</td>
                            <td>Surname</td>
                            <td>:</td>
                            <td><?php echo $rows['surname']; ?></td>
                        </tr>
                        <tr>
                            <td>7.</td>
                            <td>Father's Name</td>
                            <td>:</td>
                            <td><?php echo $rows['father_name']; ?></td>
                        </tr>
                        <tr>
                            <td>8.</td>
                            <td>Mother's Name</td>
                            <td>:</td>
                            <td><?php echo $rows['mother_name']; ?></td>
                        </tr>
                        <tr>
                            <td>9.</td>
                            <td>His Address</td>
                            <td>:</td>
                            <td><?php echo $rows['address']; ?></td>
                        </tr>
                        <tr>
                            <td>10.</td>
                            <td>Father's Occupation</td>
                            <td>:</td>
                            <td><?php echo $rows['father_occupation']; ?></td>
                        </tr>
                        <tr>
                            <td>11.</td>
                            <td>Nationality</td>
                            <td>:</td>
                            <td><?php echo $rows['father_nationality']; ?></td>
                        </tr>
                        <tr>
                            <td>12.</td>
                            <td>Godfather's Name</td>
                            <td>:</td>
                            <td><?php echo $rows['godfather_name']; ?></td>
                        </tr>
                        <tr>
                            <td>13.</td>
                            <td>His Address</td>
                            <td>:</td>
                            <td><?php echo $rows['godfather_address']; ?></td>
                        </tr>
                        <tr>
                            <td>14.</td>
                            <td>Godmother's Name</td>
                            <td>:</td>
                            <td><?php echo $rows['godmother_name']; ?></td>
                        </tr>
                        <tr>
                            <td>15.</td>
                            <td>Her Address</td>
                            <td>:</td>
                            <td><?php echo $rows['godmother_address']; ?></td>
                        </tr>
                        <tr>
                            <td>16.</td>
                            <td>Place of baptism</td>
                            <td>:</td>
                            <td><?php echo $rows['church_name']; ?></td>
                        </tr>
                        <tr>
                            <td>17.</td>
                            <td>Minister's Name</td>
                            <td>:</td>
                            <td><?php echo $rows['minister_name']; ?></td>
                        </tr>
                        <tr>
                            <td>18.</td>
                            <td>First Communion</td>
                            <td>:</td>
                            <td><?php echo $rows['communion']; ?></td>
                        </tr>
                        <tr>
                            <td>19.</td>
                            <td>Confirmation</td>
                            <td>:</td>
                            <td><?php echo $rows['confirmation']; ?></td>
                        </tr>
                        <tr>
                            <td>20.</td>
                            <td>Marriage</td>
                            <td>:</td>
                            <td><?php echo $rows['marriage']; ?></td>
                        </tr>
                        <tr>
                            <td>21.</td>
                            <td>Remarks</td>
                            <td>:</td>
                            <td style="font-size: 14px; font-style: italic"><?php echo $rows['remarks'];
                } ?></td>
                    </tr>
                </table>
                <?php include '../prefrences/certificate_footer.php'; ?>
            </div>


        </div>
    </div>
    <br><br>
</body>

</html>