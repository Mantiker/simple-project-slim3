<?php
    /** @var array $request */
?>

<h1>Main page</h1>

Hello, <?= ($request['name'] ?: 'guest') ?>
