<html>
<head>
    <title>Penggunaan In Array</title>
</head>
<body>
<?php
$program = array("HTML", "PHP", "CSS", "JavaScript");
print_r($program);
echo "<br />";
echo "<br />";
$cari = "HTML";
if (in_array($cari, $program)) {
    echo "Program Basis Web $cari ada di dalam array";
    echo "<br />";
} else {
    echo "Program Basis Web $cari tidak ada di dalam array";
    echo "<br />";
}
?>
</body>
</html>