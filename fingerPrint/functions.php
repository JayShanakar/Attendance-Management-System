<?php

function initialize_holid($holid, $from, $till, $con) 
{
    $date = $from;
    $end_date = $till;

    while (strtotime($date) <= strtotime($end_date)) 
    {
        $dt = new DateTime($date);
        $day = $dt->format('l');    //day		
        $d = $dt->format('Y-m-d');  //date

        $holid[$d] = 0;

        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
    }

    $query = "	
                    SELECT date
                    FROM holidays 
                    WHERE date BETWEEN '$from' AND '$till'
             ";
    
    $result = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));

    while ($row = mysqli_fetch_array($result)) 
    {
        $holid[$row['date']] = 1;
    }
    
    return $holid;
}


function print_chart($chart, $from, $till, $type, $holid,$comp_name,$comp_roll) 
{   
    $present_days = 0;
    $absent_days = 0;

    $date = $from;
    $end_date = $till;
    $dt = new DateTime($date);
    $d = $dt->format('Y-m-d'); //date		
	
	if($type!="Prcnt")
	{
    	echo "<TABLE borderColor=#000000 cellSpacing=0 cellPadding=6 border=2>\n";
    	echo "<th>DATE</th><th>DAY</th><th>START TIME</th><th>END TIME</th><th>TYPE</th><th>ENTRY</th><th>STATUS</th>"; 
	}

    while (strtotime($date) <= strtotime($end_date)) 
    {
        $dt = new DateTime($date);
        $d = $dt->format('Y-m-d');
        $day = $dt->format('l');

        if ($holid[$d] == 1) 
        {
            if ($type == "Complete" )
            {
                echo "<tr>";
                echo
                "<td>" . $d . " </td>" .
                "<td>" . $day . " </td>" .
                "<td>" . "" . " </td>" .
                "<td>" . "" . " </td>" .
                "<td>" . "Holiday" . " </td>" .
                "<td>" . "" . " </td>" .
                "<td>" . "" . " </td>";
                echo "</tr>";
            }
            
            else
            {
                
            }
        } 
        else if ($chart[$d][7] == $type || $type == "Complete" || $type=="Prcnt") 
        {
            
			if($type!=="Prcnt")
			{
            echo "<tr>";
            echo
            "<td>" . $chart[$d][1] . " </td>" .
            "<td>" . $chart[$d][2] . " </td>" .
            "<td>" . $chart[$d][3] . " </td>" .
            "<td>" . $chart[$d][4] . " </td>" .
            "<td>" . $chart[$d][5] . " </td>" .
            "<td>" . $chart[$d][6] . " </td>" .
            "<td>" . $chart[$d][7] . " </td>";
            echo "</tr>";
			}
		if( $type == "Complete" ||  $type == "Prcnt" || $chart[$d][7] == $type)
			{
				 if ($chart[$d][7] == "Absent")
                $absent_days++;
	            if ($chart[$d][7] == "Present")
                $present_days++;
				
			}
		}
        if ($chart[$d][0] == 2) 
        {
            //if two classes in a day
            //first has been printed above
            
            if ($holid[$d] == 0 )
            {
                if ($chart[$d][9][7] == $type || $type == "Complete") 
                {
                
                    echo "<tr>";
                    echo
                    "<td>" . $chart[$d][9][1] . "</td> " .
                    "<td>" . $chart[$d][9][2] . "</td> " .
                    "<td>" . $chart[$d][9][3] . "</td> " .
                    "<td>" . $chart[$d][9][4] . "</td> " .
                    "<td>" . $chart[$d][9][5] . "</td> " .
                    "<td>" . $chart[$d][9][6] . "</td> " .
                    "<td>" . $chart[$d][9][7] . "</td> ";
                    echo "</tr>";

                    
                }
				if( $type == "Complete" ||  $type == "Prcnt" || $chart[$d][9][7] == $type)
				{
				 if ($chart[$d][9][7] == "Absent")
                         $absent_days++;
                    if ($chart[$d][9][7] == "Present")
                        $present_days++;
					
				}
            }
            
            else if ($holid[$d]==1 )
            {
                if ($type=="Complete")
                {   echo "<tr>";
                    echo
                        "<td>" . $d . " </td>" .
                        "<td>" . $day . " </td>" .
                        "<td>" . "" . " </td>" .
                        "<td>" . "" . " </td>" .
                        "<td>" . "Holiday" . " </td>" .
                        "<td>" . "" . " </td>" .
                        "<td>" . "" . " </td>";
                        echo "</tr>";
                }
                        
            }
          
        }
        

        //if any extra classes arranged
        //no holiday check
        //because extra class can be on any holiday also
        if ($chart[$d][8] == 1) 
        {
            if ($chart[$d][10][6] == $type || $type == "Complete") 
            {
                echo "<tr>";
                echo
                "<td>" . $chart[$d][10][0] . "</td> " .
                "<td>" . $chart[$d][10][1] . "</td> " .
                "<td>" . $chart[$d][10][2] . "</td> " .
                "<td>" . $chart[$d][10][3] . "</td> " .
                "<td>" . $chart[$d][10][4] . "</td> " .
                "<td>" . $chart[$d][10][5] . "</td> " .
                "<td>" . $chart[$d][10][6] . "</td> ";
                echo "</tr>";
            }
			if( $type == "Complete" ||  $type == "Prcnt" || $chart[$d][10][6] == $type )
			{
				 if ($chart[$d][10][6] == "Absent")
                    $absent_days++;
                if ($chart[$d][10][6] == "Present")
                    $present_days++;
				
					
			}
        }

        //date increment
        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
    }
    if($type!="Prcnt")
	{
    	echo "</TABLE></HTML>";
    	echo "<br>";
    	echo "<br>";
	}
    
    if ($type == "Present" || $type == "Complete")
	{
        echo "# Present classes =   " . $present_days;
    	echo "<br>";
    	echo "<br>";
	}
    if ($type == "Absent" || $type == "Complete")
        echo "# Absent classes  =   " . $absent_days;
	if($type!="Prcnt")
	    echo "<br><br>  -   -   -   -   -   -   -   -   -   -<br><br>";
	else
	{
		$p=(($present_days)/($present_days+$absent_days))*100;
		if($_SESSION['percent']>$p)
		$_SESSION['tab1'].="<tr><td>".$comp_roll."</td><td>".$comp_name."</td><td>".$p."</td></tr>";
	}
}



function initialize_chart($chart, $chart1, $schedule, $from, $till, $con , $c_id) 
{
    //0:	0 / 1 / 2 classes
    //1:	date
    //2:	day
    //3:	time-start for class
    //4:	time-end  for class
    //5:	scheduled or extra or cancelled or not scheduled or holiday
    //6:	entry time of student
    //7:	Absent / Present
    //8:	1 -> yes extra , 0 -> no extra
    //9:	if 0=2 then go to 9  and same as $chart[9] = $chart1 so $chart[$d][9][x]
    //10:	if 8=1 then go to 10 and same as $chart[10]= $chart2 so $chart[$d][10][x];

    $date       = $from;
    $end_date   = $till;

    //outer while loop :: date incrementor through time window
    while (strtotime($date) <= strtotime($end_date)) 
    {
        $dt = new DateTime($date);
        $day = $dt->format('l');    //day		
        $d = $dt->format('Y-m-d');  //date
        
        //if only one class is there on this day
        if ($schedule[$day][0] == 1) 
        {
            if (cancel_check($con, $d, $c_id, $schedule[$day][1], $schedule[$day][2]))
            {   
                //if not cancelled, assign scheduled
                $chart[$d] = array("1", $d, $day, $schedule[$day][1], $schedule[$day][2], " Scheduled ", " ", "Absent", 0, 0, 0);
            }
            else
            {
                //if cancelled then, assign cancelled
                $chart[$d] = array("1", $d, $day, $schedule[$day][1], $schedule[$day][2], " Cancelled ", " ", "", 0, 0, 0);
            }
            
        } 
        else if ($schedule[$day][0] == 2) 
        {            
            //checking if first class of the day has been cancelled
            if (cancel_check($con, $d, $c_id, $schedule[$day][1], $schedule[$day][2]))
            {
                //if first class isn't cancelled
                $chart[$d] = array("2", $d, $day, $schedule[$day][1], $schedule[$day][2], "Scheduled", " ", "Absent", 0, 0, 0);
            }
            else
            {
                //if first class cancelled
                $chart[$d] = array("2", $d, $day, $schedule[$day][1], $schedule[$day][2], "Cancelled", " ", "", 0, 0, 0);
            }
            
            //checking if second class of the day has been cancelled
            if (cancel_check($con, $d, $c_id, $schedule[$day][3], $schedule[$day][4]))
            {
                //if second class has not been cancelled
                $chart1[$d] = array("2", $d, $day, $schedule[$day][3], $schedule[$day][4], "Scheduled", " ", "Absent", 0, 0, 0);
            }        
            else
            {
                //if second class of the day has been cancelled
                $chart1[$d] = array("2", $d, $day, $schedule[$day][3], $schedule[$day][4], "Cancelled", " ", "", 0, 0, 0);
            }
                  
            $chart[$d][9] = $chart1[$d];
        } 
        else 
        {   
            //if not 1 , not 2 then 0 classes on that day so "No scheduled class"
            $chart[$d] = array(0, $d, $day, "", "", "No scheduled class", "", "", "", "", "");
        }
        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
    }
    return $chart;
}

function get_schedule($schedule , $c_id , $con)
{    
    //setting default schedule 
    //setting all values to 00:00:00
    $i = 0;
    $day = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
    while ($i < 7) 
    {

        $schedule[$day[$i]][0] = 0;             // 	for count
        $schedule[$day[$i]][1] = "00:00:00";    //	for time1_start	
        $schedule[$day[$i]][2] = "00:00:00";    //	for time1_end
        $schedule[$day[$i]][3] = "00:00:00";    //	for time2_start
        $schedule[$day[$i]][4] = "00:00:00";    //	for time2_end
        $schedule[$day[$i]][5] = $day[$i];      //	for day	
        $i = $i + 1;
    }
 
    //query for expected scheduling and extra classes	
    $query1 =   "
                SELECT count , time1_start , time1_end , time2_start , time2_end , day		  
		FROM course_schedule 
		WHERE course_id = '$c_id'
                ";

    $result1 = mysqli_query($con, $query1) or die("Error: " . mysqli_error($con));

    //scheduled is day wise
    //so following thing have been saved 
    //0 -   count   -   how many classes ?
    //1 -   time1_start
    //2 -   time1_end
    //3 -   time2_start
    //4 -   time2_end
    //5 -   day
        
    while ($row1 = mysqli_fetch_array($result1)) 
    {
        $schedule[$row1['day']] = array($row1['count'], $row1['time1_start'], $row1['time1_end'], $row1['time2_start'], $row1['time2_end'], $row1['day']);
    }
    return $schedule;
}

function report($con, $rollno,$comp_name,$c_id, $from, $till, $type ,$schedule , $holid , $chart) {

        /*
        //intialize holiday array
        //$holid[date] = 1 if holiday or else 0
        //$holid = array();
        //$holid = initialize_holid($holid, $from, $till, $con);
        
        //setting up the chart table
        //actual report
        $chart = array();    
        $chart1= array();
        $chart2= array();
        
        //chart_initialize
        $chart = initialize_chart($chart, $chart1, $schedule, $from, $till, $con , $c_id);
        */
    
        //timestamp of student in then given interval (independent of all courses)
		$comp_roll=$rollno;
		
        $query2 =   "
                    SELECT timestamp 
                    FROM attendance 
                    WHERE userid='$rollno'	AND DATE(timestamp) BETWEEN '$from' AND '$till' 
						";
        $result2 = mysqli_query($con, $query2) or die("Error: " . mysqli_error($con));

        //array storing student's timestamp
        $ts = array();

        while ($row2 = mysqli_fetch_array($result2)) {
            array_push($ts, $row2['timestamp']);
        }

        //length of array storing student's timestamp
        $ts_length = count($ts);
        
        //counter
        $i = 0;

        // Set timezone
        date_default_timezone_set('UTC');

        // Start date
        $date = $from;

        // End date
        $end_date = $till;


        //finding total expected classes
        while (strtotime($date) <= strtotime($end_date)) {
            //outer loop goes from '$from' to '$till' checking for classes and timestamp in $ts
            //in ech outer loop inner loop goes from '$ts[0]' to '$ts[$ts_length - 1]
            //if students entry time in '$ts' is between scheduled classes then assign present 

            $dt = new DateTime($date);
            $day = $dt->format('l');    //day		
            $d = $dt->format('Y-m-d');  //date
               
            //counter
            $i = 0;  
                          
            //will enter the loop only if student is present atleast once           
            while ( $i < $ts_length ) 
            {
                
                $user_timestamp = date_create($ts[$i]);
                $user_date      = date_format($user_timestamp, 'Y-m-d');
                $user_time      = date_format($user_timestamp, 'H:i:s');

                //if only one class on this date
                //condition = count + date + start_time + finishing_time
                
                if ($schedule[$day][0] == 1 and $d == $user_date and $user_time >= $schedule[$day][1] and $user_time <= $schedule[$day][2]) 
                {
                    //in time range of class
                    
                    if (cancel_check($con, $d, $c_id, $schedule[$day][1], $schedule[$day][2])) 
                    {
                        //if not cancelled then it's scheduled
                        $chart[$d][5] = "Scheduled";
                        $chart[$d][6] = $user_time;
                        $chart[$d][7] = "Present";
                    } 
                    else 
                    {
                        //if cancelled
                        $chart[$d][5] = "Cancel";
                        $chart[$d][6] = "";
                        $chart[$d][7] = "";
                    }
                }
                
                //if user entry time is beyond class scheduled
                else if ($schedule[$day][0] == 1 and $d == $user_date and ($user_time <= $schedule[$day][1] || $user_time >= $schedule[$day][2])) 
                {
                    
                }

                //if two classes on this date
                if ($schedule[$day][0] == 2) 
                {
                    //if first isn't cancelled
                    if (cancel_check($con, $d, $c_id, $schedule[$day][1], $schedule[$day][2])) 
                    {
                        if (($d == $user_date) and ($user_time >= $schedule[$day][1]) and ($user_time <= $schedule[$day][2])) 
                        {
                            //if student entry time is in scheduled class timing
                            $chart[$d][5] = "Scheduled";
                            $chart[$d][6] = $user_time;
                            $chart[$d][7] = "Present";
                        }
                        
                        //if user entry time is beyond the scheduled class time
                        else if (($d == $user_date) and ($user_time <= $schedule[$day][1] || $user_time >= $schedule[$day][2])) 
                        {                           
                            
                        }
                    }
                    
                    //if first class of the day is cancelled 
                    else 
                    {                        
                        $chart[$d][5] = "Cancelled";
                        $chart[$d][6] = " ";
                        $chart[$d][7] = " ";
                    }

                    //if second class of the day isn't cancelled   
                    if (cancel_check($con, $d, $c_id, $schedule[$day][3], $schedule[$day][4])) 
                    {
                        //if user entry time is between scheduled class
                        if ($d == $user_date and $user_time >= $schedule[$day][3] and $user_time <= $schedule[$day][4]) {
                            $chart[$d][9][5] = "Scheduled";
                            $chart[$d][9][6] = $user_time;
                            $chart[$d][9][7] = "Present";
                        } 
                        //if entry time beyond class schedule
                        else if ($d == $user_date and ($user_time <= $schedule[$day][3] || $user_time >= $schedule[$day][4])) 
                        {
                           
                        }
                    } 
                    //second class cancelled
                    else 
                    {
                        $chart[$d][9][5] = "Cancelled";
                        $chart[$d][9][6] = " ";
                        $chart[$d][9][7] = " ";
                    }
                }
                
                //checking for extra classes
                $query = "
                            SELECT time1_start , time1_end
                            FROM alter_class 
                            WHERE course_id='$c_id' AND date='$d' AND type='E'
			";
                
                $result = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));

                while ($row = mysqli_fetch_array($result)) 
                {
                
                $chart[$d][8] = 1;

                $chart2[$d][0] = $d;
                $chart2[$d][1] = $day;
                $chart2[$d][2] = $row['time1_start'];
                $chart2[$d][3] = $row['time1_end'];
                $chart2[$d][4] = "Extra";
                $chart2[$d][5] = "";
                $chart2[$d][6] = "Absent";

                 
                if ($user_time >= $row['time1_start'] and $user_time <= $row['time1_end']) 
                {
                    
                    $chart2[$d][5] = $user_time;
                    $chart2[$d][6] = "Present";
                } 
                
                $chart[$d][10] = array($chart2[$d][0], $chart2[$d][1], $chart2[$d][2], $chart2[$d][3], $chart2[$d][4], $chart2[$d][5], $chart2[$d][6]);
                
                
            }
                //next index of $ts[]
                $i = $i + 1;
            }//checking for extra finished
            
            //for those students whose $ts_length=0
            if ($ts_length == 0)
            {
                //checking for extra classes
                $query1 = "
                            SELECT time1_start , time1_end
                            FROM alter_class 
                            WHERE course_id='$c_id' AND date='$d' AND type='E'
			";
                
                $result1 = mysqli_query($con, $query1) or die("Error: " . mysqli_error($con));
                
                while ($row = mysqli_fetch_array($result1))
                {
                $chart[$d][8] = 1;

                $chart2[$d][0] = $d;
                $chart2[$d][1] = $day;
                $chart2[$d][2] = $row['time1_start'];
                $chart2[$d][3] = $row['time1_end'];
                $chart2[$d][4] = "Extra";
                $chart2[$d][5] = "";
                $chart2[$d][6] = "Absent";


                $chart[$d][10] = array($chart2[$d][0], $chart2[$d][1], $chart2[$d][2], $chart2[$d][3], $chart2[$d][4], $chart2[$d][5], $chart2[$d][6]);
                }
            }
            
            $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
        }//while loop ends
          	print_chart($chart, $from, $till, $type, $holid,$comp_name,$comp_roll);
    }//present day ends

function class_details($con, $c_id, $from, $till) {
    //variables
    $class_count["Sunnday"] = 0;
    $class_count["Monday"] = 0;
    $class_count["Tuesday"] = 0;
    $class_count["Wednesday"] = 0;
    $class_count["Thursday"] = 0;
    $class_count["Friday"] = 0;
    $class_count["Saturday"] = 0;
    
    $total_class = 0;
    $cancelled_class = 0;
    $extra_class = 0;

    //updating count of classes per day as given in database table course_schedule
    $query = "	
		SELECT day ,count 
		FROM course_schedule 
		WHERE course_id='$c_id'	
             ";
    $result = mysqli_query($con, $query) or die("Error: " . mysqli_error($con)); 
    while ($row = mysqli_fetch_array($result)) 
    {
        $class_count[$row['day']] = $row['count'];
    }

    // Set timezone
    date_default_timezone_set('UTC');

    // Start date
    $date = $from;

    // End date
    $end_date = $till;

    //finding total expected classes in expected scheduled classes
    while (strtotime($date) <= strtotime($end_date)) 
    {
        $dt = new DateTime($date);
        $day = $dt->format('l');

        switch ($day) 
        {

            case "Monday" : {
                    $total_class = $total_class + $class_count[$day];
                    break;
                }
            case "Tuesday" : {
                    $total_class = $total_class + $class_count[$day];
                    break;
                }
            case "Wednesday" : {
                    $total_class = $total_class + $class_count[$day];
                    break;
                }
            case "Thursday" : {
                    $total_class = $total_class + $class_count[$day];
                    break;
                }
            case "Friday" : {
                    $total_class = $total_class + $class_count[$day];
                    break;
                }
        }

        //date incrementor
        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
    }

    //checking for extra and cancelled classes
    $query = "
		SELECT type 
		FROM alter_class 
		WHERE course_id='$c_id' AND date BETWEEN '$from' AND '$till'	
             ";

    $result = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
    
    while ($row = mysqli_fetch_array($result)) 
    {
        switch ($row['type']) {
            
            //E for extra
            case "E" : {
                    $extra_class = $extra_class + 1;
                    break;
                }
            
            //E for extra
            case "C" : {
                    $cancelled_class = $cancelled_class + 1;
                    break;
                }
        }
    }
    
    //checking for holidays. if holidyas are found subtract from total classes 
    $query =    "
		SELECT date 
		FROM holidays 
		WHERE  date BETWEEN '$from' AND '$till'	
                ";

    $result = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
    while ($row = mysqli_fetch_array($result)) 
    {
        $dt = new DateTime($row['date']);
        $day = $dt->format('l');        //day		
        $d = $dt->format('Y-m-d');      //date

        $total_class = $total_class - $class_count[$day];
    }
    
    $t = $total_class - $cancelled_class + $extra_class ;
 
    echo "<TABLE borderColor=#000000  cellSpacing=0 cellPadding=\"10\" border=0>\n";
    echo "From  ".$from . "  to  "  . $till. "<br><br>";
    echo "<TR><TD>Total scheduling expected :	</TD>" . "<TD class=\"val\">" . $total_class . "</TD></TR>";
    echo "<TR><TD>Total cancelled :	</TD>" . "<TD class=\"val\">" . $cancelled_class . "</TD></TR>";
    echo "<TR><TD>Total extra :	</TD>" . "<TD class=\"val\">" . $extra_class . "</TD></TR>";
    echo "<TR><TD>Total classes happened : </TD>" ."<TD class=\"val\">" . $t ."</TD></TR>";
    echo "</TABLE><br><br>";
}

function db_connect() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "new_fpa";
    $con = mysqli_connect($host, $user, $pass, $db);

    if (mysqli_connect_errno()) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    return $con;
}

function alter_db_connect() {
    // Make a MySQL Connection
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "new_fpa";

    mysql_connect($host, $user, $pass) or die(mysql_error());
    mysql_select_db($db) or die(mysql_error());
}

function cancel_check($con, $d, $c_id, $time_start, $time_end) {
    
    $query = "      SELECT      * 
                    FROM alter_class 
                    WHERE course_id='$c_id'	AND date='$d' AND type='C' AND time1_start='$time_start' AND time1_end='$time_end'
             ";
    $result = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
    $row = mysqli_fetch_array($result);

    if (is_null($row) != 0) 
    {
        return true;
    } 
    else 
    {
        return false;
    }
}

?>
