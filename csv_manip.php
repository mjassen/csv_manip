<?php

//http://rosettacode.org/wiki/CSV_data_manipulation#PHP
//http://www.w3schools.com/html/html_forms.asp
//http://php.net/manual/en/function.fgetcsv.php



//contents of sample "in.csv" file:
/*
2016-06-20,"Hello world june 20 2016."
2016-07-25,"Hello world july 25 2016."

*/






if(isset($_POST['Submit'])){ //write the posted-back values into an array and then write the array into the csv file.

	//make array that will be the new csv file.
	$mj_csv_array = array();

	$the_last_row = intval(substr($_POST['the_last_row_and_column'], 0, 12));
	$the_last_column = intval(substr($_POST['the_last_row_and_column'], -12));

	$i = 0;

	while ($i <= $the_last_row) {

		$i++;

		$j = 0;
		while ($j <= $the_last_column){

			$mj_temp = str_pad(($i -1), 12, "0", STR_PAD_LEFT) . str_pad($j, 12, "0", STR_PAD_LEFT);

			$mj_csv_array[($i - 1)][$j] = $_POST[$mj_temp];

			$j++;
		}


	}



	//now open the csv file for writing, and write the array.
	$mj_csv_file_handle = fopen('in.csv','w');



	foreach ($mj_csv_array as $mj_csv_row){

		fputcsv($mj_csv_file_handle, $mj_csv_row);

	}

	fclose($mj_csv_file_handle);



};







//read from the csv file and print it to the browser window

$mj_csv_file_handle = fopen('in.csv','r');
$row = 0;
$the_last_row_and_column = '';



$mj_csv_array = array();

echo '<form action="" method="post">';
echo '<table style="border-width:2px;border-style:solid;width:100%">';

while ($mj_csv_row = fgetcsv($mj_csv_file_handle)){

$mj_csv_array[] = $mj_csv_row;

        $num = count($mj_csv_row);

	echo '<tr style="border-width:2px;border-style:solid;;width:100%">';


        for ($c=0; $c < $num; $c++) {
            echo '<td style="border-width:2px;border-style:solid;"><input type="text" name="' . str_pad($row, 12, "0", STR_PAD_LEFT) . str_pad($c, 12, "0", STR_PAD_LEFT) . '" value="' . $mj_csv_row[$c] . '"></td>';
            //<input type="text" name="text1" value="">
			//str_pad($input, 10, "-=", STR_PAD_LEFT);
			$the_last_row_and_column = str_pad($row, 12, "0", STR_PAD_LEFT) . str_pad($c, 12, "0", STR_PAD_LEFT);
        }

	echo '</tr>';

        $row++;

}

echo '</table>';
echo '<input type="hidden" name="the_last_row_and_column" id="the_last_row_and_column" value="' .$the_last_row_and_column . '" /><br />';
echo '<input type="submit" value="Submit" name="Submit">';
echo '</form>';

fclose($mj_csv_file_handle);







?>
