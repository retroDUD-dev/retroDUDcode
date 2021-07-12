<?php
array_map('unlink', glob("/home/retr11/domains/retrodud.eu/public_html/tmp/*.*"));
array_map('unlink', glob("/home/retr11/domains/retrodud.eu/public_html/file/*.jpg"));
echo "tmp file cleared";
?>