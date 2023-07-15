<?php


require "connect.php";


function test($value){
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    exit();
};


// проверка выполнения запросов к БД
function dbCheckErr($query){
// возвращает ошибки(если есть)
    $errInfo = $query->errorInfo();
// проверка на ошибки
    if ($errInfo[0] !==PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}
// Запрос на получение данных из таблицы
function selectAll($table, $params = []){
// обращаемся к экземпляру класса
    global $pdo;
// сам запрос
    $sql = "SELECT * FROM $table";    
// проверка параметров
if(!empty($params)){
    $i=0;
    foreach($params as $key => $value){
        if (!is_numeric($value)){
            $value = "'". $value ."'";
        }
        if($i === 0){
            $sql = $sql . " WHERE " . " $key = $value";
        }else{
            $sql = $sql . " AND " . " $key = $value"; 

        } 
    $i++; 
      }
    }
   
// подготовка
    $query = $pdo->prepare($sql);
//  выполнение
    $query->execute();

    dbCheckErr($query);

// возвращает значение
    return $query->fetchAll();
}

// Запрос на получение одной строки из таблицы
function SelectONE($table, $params = []){
    // обращаемся к экземпляру класса
        global $pdo;
    // сам запрос
        $sql = "SELECT * FROM $table";    
    // проверка параметров
    if(!empty(is_array($params))){
        $i=0;
        foreach($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'". $value ."'";
            }
            if($i === 0){
                $sql = $sql . " WHERE " . " $key = $value";
            }else{
                $sql = $sql . " AND " . " $key = $value"; 
    
            } 
        $i++; 
          }
        }
    //    $sql = $sql . " LIMIT 1";
    // подготовка
        $query = $pdo->prepare($sql);
    //  выполнение
        $query->execute();
        dbCheckErr($query);
    // возвращает значение
        return $query->fetch();
    }
  

// Запись в таблицу БД
function INSERT($table, $params){
    // обращаемся к экземпляру класса
    global $pdo;

 // INSERT INTO `users` ( `admin`, `username`, `email`, `password`)VALUES ('0', 'Alester', 'Alester@mail.com', '123');
     $i=0;
     $column = "";
     $mask =""; 
 foreach ($params as $key => $value){
        if($i === 0){
            $column = $column . $key ;
            $mask = $mask . "'" . $value . "'" ;
        }else{
    
    $column =  $column . ", $key";
    $mask = $mask . ", " . "'" . $value . "'" ;
       }
    $i++;}

    $sql = "INSERT INTO $table ($column) VALUES ( $mask)";

  
     $query = $pdo->prepare($sql);
      $query->execute();
    dbCheckErr($query);
    return $pdo->lastInsertId();
}


 // Обновление строки в таблице
    function UPDATE($table, $id, $params){
        global $pdo;

         $i=0;
         $str = '';
         
        foreach ($params as $key => $value){
                if($i === 0){
                    $str =  "$key = ". "'" . $value . "'" ;
                    
                }else{
                    $str = $str . ", $key = ". "'" . $value . "'";
                   
        
            }
           $i++;
        } 
            $sql = "UPDATE $table SET $str WHERE id = $id";
                
            $query = $pdo->prepare($sql);
            $query->execute($params);
            dbCheckErr($query);
    }


    // Удаление строки в таблице
    function DELETE($table, $id){
        global $pdo;
         
            $sql = "DELETE FROM $table WHERE id = $id";
                
            $query = $pdo->prepare($sql);
            $query->execute();
            dbCheckErr($query);
    }
// пагинация. вывод страниц
    function countRow($table){
        global $pdo;
        $sql = 
        "SELECT COUNT(*) FROM $table";
        $query = $pdo->prepare($sql);
        $query->execute();
        dbCheckErr($query);    
        return $query->fetchColumn();
        }
// Выборка товаров для пагинации
function selectAllGoodsForPages($table, $limit, $offset){
    global $pdo;
    $sql =
    "SELECT * FROM $table LIMIT $limit OFFSET $offset"; 

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckErr($query);    
    return $query->fetchAll();
}
//Поиск товаров
function searchInGoods($text, $table){
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    global $pdo;
    $sql = "SELECT 
    *
    FROM $table AS g 
    WHERE g.Model LIKE '%$text%'
    OR g.Name LIKE '%$text%' "; 
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckErr($query);    
    return $query->fetchAll();

}
// Выборка товаров по категории 
function searchInCategory($table1, $table2, $id){
    $id = $_GET['category'];
    global $pdo;

    $sql =
    
    "SELECT gg.*, g.* FROM $table1 AS gg JOIN $table2 AS g ON gg.Group = g.Name WHERE gg.ID = $id"; 

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckErr($query);    
    return $query->fetchAll();

}
// Выборка товаров по категории без учета наличия
function searchInMakers($table1, $table2, $id ){
   
    global $pdo;
    $sql =   
    "SELECT 
    m.ID,
    m.Makers, 
    g.Model,
    g.Status,
    g.Fact,
    g.*
    
    FROM $table1 AS m JOIN $table2 AS g ON m.ID = g.Fact WHERE g.Fact = $id "; 


    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckErr($query);    
    return $query->fetchAll();

}
function searchInAvailable($table1, $table2, $id, $status  ){
    global $pdo;
    $sql =   
    "SELECT 
    m.ID,
    m.Makers, 
    g.Model,
    g.Status,
    g.Fact,
    g.*
    
    FROM $table1 AS m JOIN $table2 AS g ON m.ID = g.Fact WHERE g.Fact = $id AND g.Status = $status "; 


    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckErr($query);    
    return $query->fetchAll();

}


