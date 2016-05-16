<?php

//http://rosettacode.org/wiki/CSV_data_manipulation#PHP
//http://www.w3schools.com/html/html_forms.asp
//http://php.net/manual/en/function.fgetcsv.php


// - if form was posted back, then write form data into the CSV file.
// - load the data from the CSV file and display it on to the screen as a form.
// - upon "Submit" button click, post the form data back to itself.


//contents of sample "in.csv" file:
/*
1,2,3
a,b,c
I,II,III
*/




if(isset($_POST['Submit'])){ //write the posted-back values into the csv file.
    echo("Hello, we submitted your form!");
	
}else{//read from the csv file and print it to the browser window

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
echo '<input type="submit" value="Submit" name="Submit">';
echo '</form>';

echo 'the last row and column was: ' . $the_last_row_and_column;

var_dump($_POST);

fclose($mj_csv_file_handle);
	
	
	
};



















/*
//replace one cell in the array with a "0"
$mj_csv_array[1][0] = 0;



//now open the csv file for writing, and write the array including the change(s).
$mj_csv_file_handle = fopen('in.csv','w');



foreach ($mj_csv_array as $mj_csv_row){

	fputcsv($mj_csv_file_handle, $mj_csv_row);  

}

fclose($mj_csv_file_handle);
*/

?>
<?php
/*
<form action="">
  <input type="text" name="text1" value=""><br>
  Last name:<br>
  <input type="text" name="lastname" value="Mouse"><br><br>
  <input type="submit" value="Submit">
</form>
*/
?>
