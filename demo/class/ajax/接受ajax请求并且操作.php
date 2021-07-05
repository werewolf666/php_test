<?php
$fp=fopen('./test.txt','a');
$time=date('Y-m-d H:i:s'."\n");
fputs($fp,$time);