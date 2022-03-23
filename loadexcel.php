<?php
    include "./vendor/autoload.php";
    use PhpOffice\PhpSpreadsheet\IOFactory;
    if($_FILES["select_excel"]["name"] != '')
    {
        $allowed_extension = array('xls','xlsx');
        $file_array = explode(".", $_FILES["select_excel"]["name"]);
        $file_extension = end($file_array);
        if(in_array($file_extension, $allowed_extension))
        {
            $reader = IOFactory::createReader('Xlsx');
            $spreadsheet = $reader -> load($_FILES["select_excel"]["tmp_name"]);
            $writer = IOFactory::createWriter($spreadsheet, 'Html');
            $message = $writer -> save('php://output');
            echo $message;
        }
        else
        {
            $message = "Only .xls or .xlsx file allowed";
            echo $message;
        }
    }
    else
    {
        $message = "Please select file";
        echo $message;
    }

    
    

?>