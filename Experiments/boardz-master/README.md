# boardz
게시판 검색 기능 완성하기

## 기존 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.html
```

## 추가 및 수정된 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.php (수정)
[만약 추가한 파일이 있으면, 내용 추가! 없으면 이 문구 삭제!]
```

## board.php (수정)
[내용 추가!!]
<?php
$connect = mysql_connect("localhost", "kjw", "1234");
mysql_select_db("kjw_db", $connect);
$sql = "select * from boardz where title like '%$_POST[search]%'";
$result = mysql_query($sql);
$num = mysql_num_rows($result);
$row = mysql_fetch_array($result);
?>
데이터 베이스 연결하고 실행문에 search를 하였을 때 모든 것을 보여주게 만들었다.
그리고 num과 row에 실행값을 넣어주었다.

그리고 데이터베이스에는 boardz.sql문을 고대로 넣어주었다.

먼저 body 부분에 출력되는 부분을 처음에 모두 나타내줘야 되기 때문에
if문을 사용해서 num이 7일때 전체 출력하게 하였다.
그리고 다음엔 이제 검색을 하였을 때 해당되는 부분이 세 부분에서 나와야 되기 때문에
num을 3으로 나눈 후 나머지를 이용해서 열 하나당 해당되게 만들었다.
그래서 if문을 세부분을 나누어서 사용했다.
if문에 해당되는 부분은 고대로 타이틀과 url이 출력되야 되기 때문에 echo문을 이용해서 고대로 출력하게 만들었다.



