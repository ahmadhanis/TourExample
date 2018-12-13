<?php
error_reporting(0);
include_once("dbconnect.php");
$award = $_POST['award'];
$status = $_POST['status'];
$country = $_POST['country'];
//$sql = "SELECT a.PHONE, a.USERNAME, b.OWNER, b.JOBTYPE, b.PAYMENT, b.DESCRIPTION,b.LATITUDE,b.LONGITUDE,b.DATE,b.IMAGE FROM USER a, JOB b WHERE a.PHONE = b.OWNER AND b.STATUS = '$status' AND b.AWARD = '$award'";
$sql = "SELECT a.PHONE, a.USERNAME, b.OWNER, b.JOBTYPE, b.PAYMENT, b.DESCRIPTION,b.LATITUDE,b.LONGITUDE,b.DATE,b.IMAGE,b.JOBID, b.DURATION, b.STATUS, b.RATING, b.AWARD, b.COMMENT_W, b.COUNTRY FROM USER a, JOB b WHERE a.PHONE = b.OWNER AND b.STATUS = '$status' AND b.AWARD = '$award' AND b.COUNTRY = '$country' ORDER BY JOBID DESC";
$result = $conn->query($sql);
//echo "Result:", $result->num_rows;

if ($result->num_rows > 0) {
  $response["jobs"] = array();
		while ($row = $result->fetch_assoc()) {
			$joblist           = array();
			$joblist[phone]     = $row["PHONE"];
			$joblist[username]   = $row["USERNAME"];
			$joblist[owner]   = $row["OWNER"];
			$joblist[jobtype]   = $row["JOBTYPE"];
			$joblist[payment]   = $row["PAYMENT"];
			$joblist[description]   = $row["DESCRIPTION"];
			$joblist[latitude]   = $row["LATITUDE"];
			$joblist[longitude]   = $row["LONGITUDE"];
			$joblist[date]   = $row["DATE"];
			$joblist[image]   = $row["IMAGE"];
			$joblist[jobid]   = $row["JOBID"];
			$joblist[duration]   = $row["DURATION"];
			$joblist[award]   = $row["AWARD"];
			$joblist[status]   = $row["STATUS"];
			$joblist[rating]   = $row["RATING"];
			$joblist[comment]   = $row["COMMENT_W"];
            array_push($response["jobs"], $joblist);
		}
    echo json_encode($response);
} else {
    echo "failed";
}


$conn->close();
?>
