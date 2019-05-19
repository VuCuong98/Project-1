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
            array('v' => (int)$row['degree_type'], 'f'=>null),
            array('v' => (int)$row['number'], 'f'=>null)
        )
        );
};
return json_encode($data);
};
echo '<pre>';
print_r(get_data());
echo'</pre>';
// $file_name = date('d-m-Y') .'.json';
//  if(file_put_contents($file_name, get_data())){
//  	echo $file_name . 'file created';
//  }
//  else{
//  	echo 'error';
//  }
// ?>

