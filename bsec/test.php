<?php
	$arg=' 1 test.db ABC DEF';
	$command = escapeshellcmd('C:\Users\Krazzy\PycharmProjects\BlockSec\venv\Scripts\python3  C:\xampp\htdocs\bsec\blockchain.py' .$arg);
	shell_exec($command);
?>