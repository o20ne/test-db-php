<?php
$pdo_connstr = getenv("DBCONN_TYPE").':host='.getenv("DBCONN_HOST").';port='.getenv("DBCONN_PORT").';dbname='.getenv("DBCONN_DBNAME");
echo '$pdo_connstr=<br/>'.$pdo_connstr.'<br/>';
$user = getenv("DBCONN_USERNAME");
echo '$user='.$user.'<br/>';
$pass = getenv("DBCONN_PASSWORD");
echo '$pass='.$pass.'<br/>';
?>

<h2>This is for TESTING ONLY. No security implemented.<h2>

<form method="post">
SQL: <input type="text" name="sql" style="height:200px;"><br />
<input type="submit">
</form>

<?php
$sql = trim($_POST["sql"]);

if(strlen($sql)>0) {
    try {
        $dbh = new PDO($pdo_connstr, $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo '$sql='.$sql.'<br/>';
        foreach($dbh->query($sql) as $row) {
            print_r($row);
        }
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
?>