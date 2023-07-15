<?php
$category = selectAll('amis_ru_group_goods') ;
$makers = selectAll('amis_ru_makers');


//$maker_name = $_POST['maker_name'];
//$publish = 'isset($_POST['publish']) ? 1 : 0;' ;
$id = '';
$status = 
$available = '';
$order = '';
$errormsg = '';
 //$maker_name = '';
////test($status);

//поиск по производителю и наличию
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-btn'])){

    if(isset($_POST['available']) && (isset($_POST['order'])) ) {
    $makersAvailable = searchInMakers('amis_ru_makers', 'amis_ru_goods', $_POST['maker_name']);
    
    }elseif(isset($_POST['available'])){
            $makersAvailable = searchInAvailable('amis_ru_makers', 'amis_ru_goods', $_POST['maker_name'], 1 );  
           
        }elseif(isset($_POST['order'])){
     $makersAvailable = searchInAvailable('amis_ru_makers', 'amis_ru_goods', $_POST['maker_name'], 0 );

    }else{

    }
}
// Отправка формы

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-sending'])){
//test($_POST);
$name = trim($_POST['name']);
$tel = trim($_POST['tel']);
$content = trim($_POST['content']);
  
$params = [
    'name' => $name,
    'tel' => $tel,
    'content' => $content
];
 $sql = INSERT('amis_ru_message', $params);
    echo "<script>alert('Сообщение отправлено')</script>";
    //header('location: '."http://localhost/amis-avto/app/index.php");
  }else{
    //echo "<script>alert('Сообщение не удалось отправить')</script>";
   // header('location: '."http://localhost/amis-avto/app/index.php");
  
  }




?>