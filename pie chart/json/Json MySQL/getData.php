<?php
function get_data()
{
$connect = mysqli_connect("localhost","root","","project1");
$query = "SELECT degree_type, count(*) as number FROM certificates GROUP BY degree_type";
$result = mysqli_query($connect, $query);
$data = array();
// $employee_data['cols']= array(
//     'label'=>'degree_type'

//);
$data = array(
    "cols" => array(
        array('label' => 'degree_type', 'type' => 'string'),
        array('label' => 'number', 'type' => 'number')
    ),
    "rows" => array()
);
while($row = mysqli_fetch_array($result))
{
    //echo "['".$row["degree_type"]."', ".$row["number"]."],";
    $data['rows'][] = array(
        'c' => array(
            array('v' => $row['degree_type']),
            array('v' => $row['number'])
        )
        );
};
return json_encode($data);
};
echo '<pre>';
print_r(get_data());
echo'</pre>';


