<?php
function get_data()
{
$connect = mysqli_connect("localhost","root","","project1");
$query = "SELECT degree_type, count(*) as number FROM certificates GROUP BY degree_type";
$result = mysqli_query($connect, $query);
$data = array();



$data = array(
    "cols" => array(
        array('id'=>'','label' => 'degree_type','pattern'=>'', 'type' => 'string'),
        array('id'=>'','label' => 'number','pattern'=>'', 'type' => 'number')
    ),
    "rows" => array()
);
while($row = mysqli_fetch_array($result))
{
    //echo "['".$row["degree_type"]."', ".$row["number"]."],";
    $data['rows'][] = array(
        'c' => array(
            array('v' => $row['degree_type'], 'f'=>null),
            array('v' => (int)$row['number'], 'f'=>null)
        )
        );
};
return json_encode($data);
};
echo get_data();

?>

