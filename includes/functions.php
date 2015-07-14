<?
mysql_connect("localhost","root","");
mysql_select_db("tctwbims");





function createRandomPassword() {

    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;

    while ($i <= 7) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }

    return $pass;
}

function GetMonthString($n)
{
    $timestamp = mktime(0, 0, 0, $n, 1, 2005);
    
    return date("F", $timestamp);
}
?>