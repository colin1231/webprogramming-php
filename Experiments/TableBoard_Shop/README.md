# TableBoard_Shop
게시판-Shop 의 TODO 완성하기!

## 기존 파일
```
 .
├── css - board_form.php와 index.php 에서 사용하는 stylesheet
│   └── ...
├── fonts - 폰트
│   └── ...
├── images - 아이콘 이미지
│   └── ...
├── vender - 외부 라이브러리
│   └── ...
├── js - board_form.php와 index.php 에서 사용하는 javascript
│   └── ...
├── function
│   └── insert.php - 게시글 작성 기능 구현
│   └── update.php - 게시글 수정 기능 구현
│   └── delete.php - 게시글 삭제 기능 구현
├── board_form.php - 게시글 작성/수정 시 사용하는 form이 포함된 php 파일
├── index.php - 게시글 조회 기능 구현
```

## MySQL 테이블 생성!

[여기에 테이블 생성 시, 사용한 Query 를 작성하세요.]
Note: 
- table 이름은 tableboard_shop 으로 생성
- 기본키는 num 으로, 그 외의 속성은 board_form.php 의 input 태그 name 에 표시된 속성 이름으로 생성
- 각 속성의 type 은 자유롭게 설정 (단, 입력되는 값의 타입과 일치해야 함)
    - ex) price -> int
    - ex) name -> char or varchar
    먼저 cmd창을 열어서 나의 데이터베이스에 테이블을 생성하였다.
    
    create table tableboard_shop(
         num int auto_increment,
         date date,
         order_id varchar(10),
         name varchar(10),
         price int,
         quantity int,
         primary key(num)
        );
      이걸로 테이블 생성
## index.php 수정
[여기에 index.php 를 어떻게 수정했는지, 설명을 작성하세요.]
먼저 
<?php
       # TODO: MySQL 데이터베이스 연결 및 레코드 가져오기!
   
   $connect = mysql_connect("localhost","kjw","1234");
   mysql_select_db("kjw_db", $connect);
   $sql = 'select * from tableboard_shop';
   $result = mysql_query($sql);
   
   $numofrow = mysql_num_rows($result);
   ?>
   데이터베이스를 나의 계정이랑 연결을 하고
   쿼리문을 tableboard_shop의 모든 걸 보여주는 걸로 하고
   result는 쿼리실행의 결과를 나타내고
   numofrow 결과값을 행으로 나타내게 하였다.
   
   밑에서 보면 column1부터 6까지 내가 데이터베이스에 만든 구조들을 연결한 후 출력하게 만들었다.
<?php
                       for($i=0;$i<$numofrow;$i++) {
                           $row = mysql_fetch_row($result);
                           echo '<tr onclick="location.href = (\'board_form.php?num='; echo $row[0];echo '\')">';
                           echo '<td class="column1">'; echo $row[1]; echo '</td>';
                           echo '<td class="column2">'; echo $row[2]; echo '</td>';
                           echo '<td class="column3">'; echo $row[3]; echo '</td>';
                           echo '<td class="column4">'; echo '$'; echo $row[4]; echo '</td>';
                           echo '<td class="column5">'; echo $row[5]; echo '</td>';
                           echo '<td class="column6">'; echo '$'; echo $row[4]*$row[5]; echo '</td>';
                           echo '</tr>';
                       }
    ?>
    
                       
   
## function
### insert.php 수정
[여기에 insert.php 를 어떻게 수정했는지, 설명을 작성하세요.]
$connect = mysql_connect("localhost","kjw","1234");
mysql_select_db("kjw_db",$connect);

$sql = "insert into tableboard_shop(date,order_id, name, price, quantity) values('$_POST[date]', '$_POST[order_id]', '$_POST[name]', '$_POST[price]', '$_POST[quantity]')";
$result = mysql_query($sql);
먼저 데이터베이스 연결하고나서 삽입하는 문법인 insert into values를 사용해서 값을 하나씩 post로 받았다.
### update.php 수정
[여기에 update.php 를 어떻게 수정했는지, 설명을 작성하세요.]
$connect = mysql_connect("localhost","kjw","1234");
mysql_select_db("kjw_db",$connect);



$sql = "update tableboard_shop set date='$_POST[date]', name= '$_POST[name]', order_id= '$_POST[order_id]', price = '$_POST[price]', quantity = '$_POST[quantity]' where num = $_GET[num]";
$result = mysql_query($sql);
여기서도 데이터베이스를 연결하고 update문을 사용해서 하나씩 순서대로 받게 하였다.
### delete.php 수정
[여기에 delete.php 를 어떻게 수정했는지, 설명을 작성하세요.]
$connect = mysql_connect("localhost","kjw","1234");
mysql_select_db("kjw_db",$connect);
$sql = "delete from tableboard_shop where num = $_GET[num]";
$result = mysql_query($sql);
데이터베이스 연결하고 delete from을 이용하고 선언한 num 이랑 getnum이랑 같은 부분만 지우게 해서 위에서 선언한 num에 맞는 부분만 지우게 하였다.
