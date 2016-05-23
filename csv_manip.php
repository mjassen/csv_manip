<?php

//http://rosettacode.org/wiki/CSV_data_manipulation#PHP
//http://www.w3schools.com/html/html_forms.asp
//http://php.net/manual/en/function.fgetcsv.php


// - if post back, save posted values to csv
// - load the data from the CSV file and display it on to the screen as a form.
// - upon "Submit" button click, post the form data back to itself.



//contents of sample "in.csv" file:
/*
1,2,3
a,b,c
I,II,III
*/



/*
if(isset($_POST['Submit'])){ //write the posted-back values into the csv file.
    echo("Hello, we submitted your form!");
	
	$the_last_row = intval(substr($_POST['the_last_row_and_column'], 0, 12));
	$the_last_column = intval(substr($_POST['the_last_row_and_column'], -12));
	
	
	//make array that will be the new csv file.
	$mj_csv_array = array();
	
	
	//loop, inserting each post variable into its spot in the array.
for ($counter=0; $counter<=$the_last_column; $counter++) {
	
	for ($rowcounter=0; $rowcounter<=$the_last_row; $rowcounter++) {
	
	
	
$mj_csv_array[$rowcounter][$counter] = 0;
}
	
}


	//save (write) the array to the .csv file.
	var_dump($mj_csv_array);
	
};
*/





if(isset($_POST['Submit'])){ //write the posted-back values into the csv file.
    echo("Hello, we submitted your form!");
	
	//make array that will be the new csv file.
	$mj_csv_array = array();
	
	$the_last_row = intval(substr($_POST['the_last_row_and_column'], 0, 12));
	$the_last_column = intval(substr($_POST['the_last_row_and_column'], -12));
	
	echo 'the_last_row_and_column: ' . $_POST['the_last_row_and_column'] ;
	echo 'the_last_row: ' . $the_last_row ;
	echo 'the_last_column: ' . $the_last_column ;
	
	
	
	//loop, inserting each post variable into its spot in the array.
	for ($rowcounter=0; $rowcounter<=$the_last_row; $rowcounter++) {
	for ($columncounter=0; $columncounter<=$the_last_column; $columncounter++) {

	echo 'rowcounter + columncounter: ' . $rowcounter . '+' . $columncounter;
	$mj_csv_array[$rowcounter][$columncounter] = 0;

	
}
	}
	
	
};

var_dump($mj_csv_array);

















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

echo 'the last row and column was: ' . $the_last_row_and_column;

var_dump($_POST);

fclose($mj_csv_file_handle);
	












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
