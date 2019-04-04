<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, POST로 받아온 내용 입력하기!
$connect = mysql_connect("localhost","kjw","1234");
mysql_select_db("kjw_db");


# 참고 : 에러 메시지 출력 방법
echo "<script> alert('insert - error message') </script>"

?>

<script>
    location.replace('../index.php');
</script>
