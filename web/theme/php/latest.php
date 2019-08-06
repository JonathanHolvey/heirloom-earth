<?php
$latest = buildPage(array_values($dbPages->getList(1, 1))[0]);
header("Location: /" . $latest->slug());
