<?php 
  /* For loop for printing the start Date and end date from current month to next year same month */
  for($i = 0;$i<13;$i++) {
			/* Start Date and End Date */
			$startDate = date('Y-m-01 00:00:00',strtotime('first day of +'.$i.' month')).'<br/>';
			$endDate = date('Y-m-t 12:59:59',strtotime('last day of +'.$i.' month')).'<br/>';
			
			/* Query for get the Data between two Dates in MySQL */
			$query = 'select count(*) as totalRecords, MONTHNAME("'.$startDate.'") as month , YEAR("'.$startDate.'") as year from application_forms where (created BETWEEN "'.$startDate.'" AND "'.$endDate.'")';
			
			$result = $conn->execute($query);//Query Execution in CakePhp
			$dataFilterByMonth = $result->fetchAll('assoc');//Fetch in CakePhp
			
			/* For loop for getting the all data in one Array */
			foreach($dataFilterByMonth as $key => $value) { 
				$allData[] =$value;
			}
			/* End Here */
	}
	/* End */

	/* Print Data from current month to same month in next year*/
	echo "<pre>";
	print_r($allData);
	exit;