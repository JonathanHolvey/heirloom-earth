<?php
$latest = buildPage($dbPages->getList(1, 1, true)[0]);
header("Location: /" . $latest->slug());
