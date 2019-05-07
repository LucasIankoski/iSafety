<?php
require("conexao.php");

mysqli_set_charset($conn,"utf8");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Select all the rows in the markers table
$query = "SELECT * FROM marker";
$result = mysqli_query($conn,$query);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'idmarker="' . $row['idmarker'] . '" ';
  echo 'evento="' . parseToXML($row['evento']) . '" ';
  echo 'periodo="' . parseToXML($row['periodo']) . '" ';
  echo 'dt="' . parseToXML(date('d-m-Y',strtotime($row['data']))) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}

// End XML file
echo '</markers>';

?>