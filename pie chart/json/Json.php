<?php
function get_data()
{
$connect = mysqli_connect("localhost","root","","project1");
$query = "SELECT degree_type, count(*) as number FROM certificates GROUP BY degree_type";
$result = mysqli_query($connect, $query);
$employee_data = array();
$employee_data['cols']= array(
    'label'=>'degree_type'

);
while($row = mysqli_fetch_array($result))
{
    $employee_data[] =array(
        //'degree_type'=> $row["degree_type"],
        'degree_type'=>$row["degree_type"],
        'number' =>$row["number"]
    );
}
return json_encode($employee_data);
}
// echo '<pre>';
// print_r(get_data());
// echo'</pre>';
 $file_name = fileJson .'.json';
 if(file_put_contents($file_name, get_data())){
 	echo $file_name . 'file created';
 }
 else{
 	echo 'error';
 }
?>