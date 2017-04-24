<?php  
//数据库配置  
$dbconf= array(    
        'host'=>'127.0.0.1',    
        'user'=>'root',    
        'password'=>'root',//因为测试，我就不设置密码，实际开发中，必须建立新的用户并设置密码    
        'dbName'=>'chart',    
        'charSet'=>'utf8',    
        'port'=>'3306' );  
function openDb($dbconf){$conn=mysqli_connect($dbconf['host'],$dbconf['user'],$dbconf['password'],$dbconf['dbName'],$dbconf['port']) or die('打开失败');    
    //当然如上面不填写数据库也可通过mysqli_select($conn,$dbconf['dbName'])来选择数据库    
    mysqli_set_charset($conn,$dbconf['charSet']);//设置编码    
    return $conn;    
}   
$conn=openDb($dbconf);    
//2query方法执行增、查、删、改    
$sql='SELECT userName as `label`, score as `value` FROM test';    
/*************数据查询***************************/    
$rs=$conn->query($sql);  
  
$data=array();//保存数据    
while($tmp=mysqli_fetch_assoc($rs)){//每次从结果集中取出一行数据    
    $data[]=$tmp;    
}    
//对数据进行相应的操作    
 echo  json_encode($data);