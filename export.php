<?php
include 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
$connect = new PDO("mysql:host=localhost;dbname=hubing", "root", "");
$query = "SELECT * FROM excel_import ORDER BY MSSV DESC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
if(isset($_POST["export"]))
{
  $file = new Spreadsheet();

  $active_sheet = $file->getActiveSheet();

  $active_sheet->setCellValue('A1', 'MSSV');
  $active_sheet->setCellValue('B1', 'HoVaTen');
  $active_sheet->setCellValue('C1', 'CMND');
  $active_sheet->setCellValue('D1', 'Email');

  $count = 2;

  foreach($result as $row)
  {
    $active_sheet->setCellValue('A' . $count, $row["MSSV"]);
    $active_sheet->setCellValue('B' . $count, $row["HoVaTen"]);
    $active_sheet->setCellValue('C' . $count, $row["CMND"]);
    $active_sheet->setCellValue('D' . $count, $row["Email"]);

    $count = $count + 1;
  }

  $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, $_POST["file_type"]);

  $file_name = time() . '.' . strtolower($_POST["file_type"]);

  $writer->save($file_name);

  header('Content-Type: application/x-www-form-urlencoded');

  header('Content-Transfer-Encoding: Binary');

  header("Content-disposition: attachment; filename=\"".$file_name."\"");

  readfile($file_name);

  unlink($file_name);

  echo "Completed";

  exit;

}
?>

<!DOCTYPE html>
<html>
   <head>
     <title>Xuất danh sách sinh viên</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <link rel="shortcut icon" href="./login/hubing-icon.svg" type="image/x-icon">
   </head>

   <body>
     <div class="container">
      <br/>
        <h3 align="center">Xuất danh sách sinh viên</h3>
      <br/>
        <div class="panel panel-default">
          <div class="panel-heading">
            <form method="post">
              <div class="row">
                <div class="col-md-6">Mời bạn lựa chọn định dạng</div>
                <div class="col-md-4">
                  <select name="file_type" class="form-control input-sm">
                    <option value="Xlsx">Xlsx</option>
                    <option value="Xls">Xls</option>
                    <option value="Csv">Csv</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <input type="submit" name="export" class="btn btn-primary btn-sm" value="Export" />
                </div>
              </div>
            </form>
          </div>
          <div class="panel-body">
          <div class="table-responsive">
           <table class="table table-striped table-bordered">
                <tr>
                  <th>MSSV</th>
                  <th>Họ và Tên</th>
                  <th>CMND</th>
                  <th>Email</th>
                </tr>
                <?php

                foreach($result as $row)
                {
                  echo '
                  <tr>
                    <td>'.$row["MSSV"].'</td>
                    <td>'.$row["HoVaTen"].'</td>
                    <td>'.$row["CMND"].'</td>
                    <td>'.$row["Email"].'</td>
                  </tr>
                  ';
                }
                ?>

              </table>
          </div>
          </div>
        </div>
     </div>
      <br />
      <br />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </body>
</html>
