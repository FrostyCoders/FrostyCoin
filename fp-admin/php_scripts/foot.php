<?php

$file = 'footer.txt';
isset ($_POST['footer']);
if (file_exists($file))
{
$data = file_get_contents( $file );
$newText = $_POST['foter'];
$o = fopen( $file, "w+" );    
$save = fwrite( $o, $newText );
fclose( $o );    
}
else
{
$newText = "";
$o = fopen( $file, "w+" );
$save = fwrite( $o, $newText );
fclose( $o );
$data = file_get_contents( $file );
}
?>