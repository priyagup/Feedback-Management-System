<?php

 class RepModel extends CI_Model{

	 public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        		$this->load->helper('form');
        }



    public function ajaxGetCategoryGd($hotel){
    	$result = array();
    	$res[] = "['category','value']";
    	//array('category' => 'value');
    	//"['category'='value']";
    	$query = $this->db->query("select pf.feedback_category as feedback_category,count(1) as COUNT from fms_process_feedback pf,fms_reservation rs where pf.reservation_id = rs.reservation_id and LOWER(rs.hotel_name)=LOWER('".$hotel."') and pf.category_rating = 'good' group by feedback_category order by COUNT");
		foreach ($query->result() as $row) {
			$cat = $row->feedback_category;
			$count = $row->COUNT;
			//$re = array($cat => $count);
			$res[] = "['".$cat."',".$count."]"; 
			//array_push($res, $re);
			//array_push($result, $cat,$count);
		}    	
		//$jres = json_encode($result);
		//print_r($jres);
		return $res ;
    }


    public function ajaxGetCategoryDrillDown($val,$cat,$hotel){
    
	    	$results = array(
		    'cols' => array (
		        array('label' => 'Subcategory', 'type' => 'string'),
		        array('label' => 'count', 'type' => 'number')
		    ),
		    'rows' => array()
		);

	     $query = $this->db->query('SELECT pf.feedback_subcat AS feedback_subcat, COUNT(1) AS COUNT FROM  fms_process_feedback pf,fms_reservation rs WHERE  pf.reservation_id = rs.reservation_id  AND LOWER(rs.hotel_name) = LOWER("'.$hotel.'")  AND pf.category_rating = "'.$val.'" AND pf.feedback_category = "'.$cat.'" GROUP BY feedback_subcat ORDER BY COUNT');
	     foreach ($query->result() as $row) {
	    	$results['rows'][] = array('c' => array(
	    		array('v' => $row->feedback_subcat),
	    		array('v' => $row->COUNT)
	    		));

	    	}
	   return $results;

    }


    public function ajaxgetGdData($hotel){
    $results = array(
	    'cols' => array (
	        array('label' => 'category', 'type' => 'string'),
	        array('label' => 'count', 'type' => 'number')
	    ),
	    'rows' => array()
		);


    $query = $this->db->query("select pf.feedback_category as feedback_category,count(1) as COUNT from fms_process_feedback pf,fms_reservation rs where pf.reservation_id = rs.reservation_id and LOWER(rs.hotel_name)=LOWER('".$hotel."') and pf.category_rating = 'good' group by feedback_category order by COUNT");
	    foreach ($query->result() as $row) {
	    	$results['rows'][] = array('c' => array(
	    		array('v' => trim($row->feedback_category)),
	    		array('v' => $row->COUNT)
	    		));

	    	}
	   return $results;

    }



public function ajaxgetBdData($hotel){
	    $results = array(
		    'cols' => array (
		        array('label' => 'category', 'type' => 'string'),
		        array('label' => 'count', 'type' => 'number')
		    ),
		    'rows' => array()
		);
	    $query = $this->db->query("select pf.feedback_category as feedback_category,count(1) as COUNT from fms_process_feedback pf,fms_reservation rs where pf.reservation_id = rs.reservation_id and LOWER(rs.hotel_name)=LOWER('".$hotel."') and pf.category_rating = 'bad' group by feedback_category order by COUNT");
		    foreach ($query->result() as $row) {
		    	$results['rows'][] = array('c' => array(
		    		array('v' => trim($row->feedback_category)),
		    		array('v' => $row->COUNT)
		    		));

		    	}
	   return $results;

    }


public function getNPS($hotel){
	$promoters = 0;
	$detarctors = 0;
	$count = 0;
	//Get Promoters
	$query1 = $this->db->query("select count(1) as Promoters from fms_customer_feedback  pf,fms_reservation rs where pf.reservation_id = rs.reservation_id and LOWER(rs.hotel_name)=LOWER('".$hotel."') and pf.overall_rating > 8");
	if ($query1->num_rows() > 0)
		{
		   foreach ($query1->result() as $row1)
		   {
		   		$promoters = $row1->Promoters;
		   }
		}
	//Get Detractors 
	$query2 = $this->db->query("select count(1) as Detractors from fms_customer_feedback pf,fms_reservation rs where pf.reservation_id = rs.reservation_id and LOWER(rs.hotel_name)=LOWER('".$hotel."') and pf.overall_rating < 6");
	if ($query2->num_rows() > 0)
		{
		   foreach ($query2->result() as $row2)
		   {
		   		$detarctors = $row2->Detractors;
		   }
		}
	//Get total count
	$query3 = $this->db->query("select count(1) as TotalCount  from fms_customer_feedback  pf,fms_reservation rs where pf.reservation_id = rs.reservation_id and LOWER(rs.hotel_name)=LOWER('".$hotel."') and pf.overall_rating is not null");
	if ($query3->num_rows() > 0)
		{
		   foreach ($query3->result() as $row3)
		   {
		   		$count = $row3->TotalCount;
		   }
		}

	$nps = ($promoters/$count) - ($detarctors/$count);
	$rnps = round($nps,2);
	$results = array(
		    'cols' => array (
		        array('label' => 'category', 'type' => 'string'),
		        array('label' => 'count', 'type' => 'number')
		    ),
		    'rows' => array(
		    	array('c' => array(
					    		array('v' => 'NPS'),
					    		array('v' => $rnps)
					    					)
					    		)
		    	)
		);


	return $results;

}	

public function getDaywiseStats(){
	$results = array(
	    'cols' => array (
	        array('label' => 'category', 'type' => 'string'),
	        array('label' => 'count', 'type' => 'number')
	    ),
	    'rows' => array()
	);

	$query = $this->db->query('select DATE(modified_date) as Date,category_rating,count(*) as count from fms_process_feedback group by DATE(modified_date),category_rating');
	if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
		   		$date = $row->Date;
		   		$category_rating = $row->category_rating;
		   		$count = $row->count;

		   		$results['rows'][] = array('c' => array(
		    		array('v' => $row->feedback_category),
		    		array('v' => $row->COUNT)
		    		));
		   }
		}

}

public function getRatingsCount($hotel){
	
	//Get Count >8
	$query1 = $this->db->query('select count(*) as Promoters from fms_customer_feedback fcf,fms_reservation fr where fcf.reservation_id = fr.reservation_id and fcf.overall_rating >= 8 and fr.hotel_name="'.$hotel.'"');
	if ($query1->num_rows() > 0)
		{
		   foreach ($query1->result() as $row1)
		   {
		   		$promoters = $row1->Promoters;
		   }
		}

	//Get Detractors 
	$query2 = $this->db->query('select count(*) as Detractors from fms_customer_feedback fcf,fms_reservation fr where fcf.reservation_id = fr.reservation_id and fcf.overall_rating < 6 and fr.hotel_name="'.$hotel.'"');
	if ($query2->num_rows() > 0)
		{
		   foreach ($query2->result() as $row2)
		   {
		   		$detarctors = $row2->Detractors;
		   }
		}
	//Get Count for Passivers
	$query3 = $this->db->query('select count(*) as Passivers  from fms_customer_feedback fcf,fms_reservation fr where fcf.reservation_id = fr.reservation_id and fcf.overall_rating > 5 and fcf.overall_rating < 8  and fr.hotel_name="'.$hotel.'"');
	if ($query3->num_rows() > 0)
		{
		   foreach ($query3->result() as $row2)
		   {
		   		$passivers = $row2->Passivers;
		   }
		}

		$results = array(
		    'cols' => array (
		        array('label' => 'category', 'type' => 'string'),
		        array('label' => 'count', 'type' => 'number')
		    ),
		    'rows' => array()
		);	

		$results['rows'][] =  			
		    	array('c' => array(
					    		array('v' => 'Promoters'),
					    		array('v' => $promoters)
					    			)		
					    					);


		$results['rows'][] = 
		    	array('c' => array(
					    		array('v' => 'Passivers'),
					    		array('v' => $passivers)
					    )
					   );

		$results['rows'][] = 
		    	array('c' => array(
					    		array('v' => 'Detractors'),
					    		array('v' => $detarctors)
					  )	
					);		


		return $results;
	}


public function getOverallCatAnal($hotel){
	$results = array(
	    'cols' => array (
	        array('label' => 'checkoutDate', 'type' => 'string'),
	        array('label' => 'Rating', 'type' => 'number'),
	        array('label' => 'Feedback', 'type' => 'string'),
	        array('label' => 'Hotel', 'type' => 'string'),
	        array('label' => 'Location', 'type' => 'string'),
	        array('label' => 'Name', 'type' => 'string'),
	        array('label' => 'Contact_Number', 'type' => 'string')
	    ),
	    'rows' => array()
	);

	$query = $this->db->query("SELECT fr.checkout_timestamp as checkoutDate,fcf.overall_rating as Rating,fcf.feedback_message Feedback,fr.hotel_name as Hotel,fr.hotel_location Location,concat(fc.first_name,' ',fc.last_name) as Name,fc.contact_number Contact_Number FROM fms_customer_feedback fcf,fms_reservation fr,fms_customer fc WHERE LOWER(fr.hotel_name) = LOWER('".$hotel."') and fcf.feedback_message <> '' and fcf.reservation_id = fr.reservation_id and fcf.customer_id = fc.customer_id");
	if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
		   		
		   		$results['rows'][] = array('c' => array(
		    		array('v' => $row->checkoutDate),
		    		array('v' => $row->Rating),
		    		array('v' => $row->Feedback),
		    		array('v' => $row->Hotel),
		    		array('v' => $row->Location),
		    		array('v' => $row->Name),
		    		array('v' => $row->Contact_Number)
		    		));
		   		
 /*
 				$results['rows'][] = array(
		    		$row->checkoutDate,
		    		$row->Rating,
		    		$row->Feedback,
		    		$row->Hotel,
		    		$row->Location,
		    		$row->Name,
		    		$row->Contact_Number
		    		);

*/
		   }
		}

	return $results;
}	

public function getDayCount(){
$results = array(
		    'cols' => array (
		        array('label' => 'Date', 'type' => 'date'),
		        array('label' => 'category_rating', 'type' => 'string'),
		        array('label' => 'count', 'type' => 'number')
		    ),
		    'rows' => array()
		);	



$query = $this->db->query("select d.dte as date, r.category_rating as category_rating, count(pf.modified_date) as count from (select distinct date(pf.modified_date) as dte from fms_process_feedback pf,fms_reservation rs WHERE  pf.reservation_id = rs.reservation_id  AND rs.hotel_name = 'cocoon' ) d cross join  (select distinct pf.category_rating from fms_process_feedback pf, fms_reservation rs WHERE  pf.reservation_id = rs.reservation_id  AND rs.hotel_name = 'cocoon') r  left join fms_process_feedback pf on date(pf.modified_date) = d.dte and pf.category_rating = r.category_rating group by d.dte, r.category_rating");

if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
		   	$results['rows'][] = array('c' => array(
		   		array('v' => $row->date),
		   		array('v' => $row->category_rating),
		   		array('v' => $row->count)
		   		));
		   }
		 }
 return $results;
}


public function ajaxgetcountbyday($hotel){
	$results = array(
			'cols' => array (
					array('label' => 'Date', 'type' => 'string'),
					array('label' => 'count', 'type' => 'number')
			),
			'rows' => array()
	);


	$query = $this->db->query("select DATE(f.modified_date) as date,count(1) as totalcount from fms_process_feedback f,fms_reservation r where f.reservation_id = r.reservation_id and lower(r.hotel_name) = LOWER('".$hotel."') group by DATE(f.modified_date)");
	if ($query->num_rows() > 0)
	{
		foreach ($query->result() as $row)
		{
			$results['rows'][] = array('c' => array(
					array('v' => $row->date),
					array('v' => $row->totalcount)
					));
		}
	}
	
	return $results;
} 



public function getcountlastweek($start,$end,$hotel){
	
	$query = $this->db->query("select count(*) as weekcount from fms_process_feedback f,fms_reservation r where f.reservation_id = r.reservation_id and LOWER(r.hotel_name)= LOWER('".$hotel."') and date(f.modified_date)>= ".$start." and date(f.modified_date) <= ".$end);
	if ($query->num_rows() > 0)
	{
		foreach ($query->result() as $row)
		{
			$weekcount = $row->weekcount;
		}
		
		return $weekcount;
	}
}


public function counttilldate($hotel){
	$query = $this->db->query("select count(*) as count from fms_process_feedback f,fms_reservation r where f.reservation_id = r.reservation_id and LOWER(r.hotel_name)= LOWER('".$hotel."')");
	if ($query->num_rows() > 0)
	{
		foreach ($query->result() as $row)
		{
			$count = $row->count;
		}
	
		return $count;
	}
}

public function counttoday($hotel){
	$d = date("Y-m-d");
	$query = $this->db->query("select count(*) as daycount from fms_process_feedback f,fms_reservation r where f.reservation_id = r.reservation_id and LOWER(r.hotel_name)= LOWER('".$hotel."') and date(f.modified_date)= ".$d);
	if ($query->num_rows() > 0)
	{
		foreach ($query->result() as $row)
		{
			$count = $row->daycount;
		}
	
		return $count;
	}
	else{
		return 0;
	}
}

public function daywiseCategory($hotel){

$results = array(
		    'cols' => array (
		        array('label' => 'Date', 'type' => 'string'),
		        array('label' => 'CategoryBad', 'type' => 'number'),
		        array('label' => 'CategoryGood', 'type' => 'number')
		    ),
		    'rows' => array()
		);	

$query = $this->db->query("select cast(f.modified_date as date) AS modified_date, (select distinct category_rating from fms_process_feedback where category_rating='bad') as bad,count(case when f.category_rating='bad' and lower(r.hotel_name)=lower('".$hotel."')  then 1 end) as badcount, (select distinct category_rating from fms_process_feedback where category_rating='good') as good,count(case when category_rating='good' and lower(r.hotel_name)=lower('".$hotel."')  then 1 end) as goodcount from fms_process_feedback f,fms_reservation r  where f.category_rating is not null  and f.reservation_id=r.reservation_id group by 1");
if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
		   	$results['rows'][] = array('c' => array(
		   		array('v' => $row->modified_date),
		   		array('v' => $row->badcount),
		   		array('v' => $row->goodcount)
		   		));
		   }
		}

return $results;
}



public function getNoReplyData(){
$filename = "noreply";
$csv_filename =  $filename."_".date("Y-m-d_H-i",time()).".csv";
$custarr = array();
$fileContent = "";
$query = $this->db->query("select c.first_name as fname,c.last_name as lname,c.contact_number as phone,r.checkin_timestamp as checkin,r.checkout_timestamp as checkout,r.hotel_name as hotel,r.hotel_location as location from fms_customer c ,fms_reservation r where r.customer_id=c.customer_id and  r.reservation_id in (
 SELECT reservation_id
FROM  `fms_customer_feedback` 
WHERE  `feedback_status` =  'W'
AND DATE( created_date ) = CURDATE( ) - INTERVAL 1 
DAY 
 ) ");

$fd = @fopen( 'php://output', 'w' );
$fileContent = "firstname,lastname,contactnumber,checkindate,checkoutdate,hotel,location"."\n";
if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
		   {
		   	//fputcsv($fd, $row ,',');
		   	$fileContent .= "".$row->fname.",".$row->lname.",".$row->phone.",".$row->checkin.",".$row->checkout.",".$row->hotel.",".$row->location."\n";
		   }	
		}

 //fseek($fd, 0);
fputs($fd, $fileContent);
fclose($fd);
	
//echo $fileContent;
header('Content-type: application/csv');
header("content-disposition: attachment;filename=$csv_filename"); 
//fpassthru($fd);

exit;
}



}

?>