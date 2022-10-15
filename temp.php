<!DOCTYPE html>

<html>

<head>

    <title>How to pass PHP variables in JavaScript or jQuery? - HDTuto.com</title>

</head>

<body>
hiii
 

<?php

    $simple = 'demo text string';

    $complexArray = array('demo', 'text', array('foo', 'bar'));

?>

 

<script type="text/javascript">

    var simple = '<?php echo $simple; ?>';

    console.log(simple);

    var complexArray = <?php echo json_encode($complexArray); ?>;

    console.log(complexArray);

</script>

 

</body>

</html>