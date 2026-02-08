<?php
$host = getenv('DB_HOST') ?: 'mysql';
$port = getenv('DB_PORT') ?: '3306';
$db   = getenv('DB_DATABASE') ?: 'cleaning_kirov';
$user = getenv('DB_USERNAME') ?: 'cleaning_kirov';
$pass = getenv('DB_PASSWORD') ?: 'secret';
$max  = (int) (getenv('DB_WAIT_MAX') ?: 60);
$step = 2;

for ($i = 0; $i < $max; $i += $step) {
    try {
        $dsn = "mysql:host=$host;port=$port;dbname=$db";
        new PDO($dsn, $user, $pass, [PDO::ATTR_TIMEOUT => 3]);
        exit(0);
    } catch (Throwable $e) {
        if ($i === 0) {
            echo "Waiting for MySQL at {$host}:{$port}...\n";
        }
        sleep($step);
    }
}
fwrite(STDERR, "MySQL not ready after {$max}s\n");
exit(1);
