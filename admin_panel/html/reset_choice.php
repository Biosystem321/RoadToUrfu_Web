<?php

if(isset($_POST['edit']))
    unset($_POST['edit']);
if(isset($_POST['add']))
    unset($_POST['add']);
if(isset($_POST['delete']))
    unset($_POST['delete']);

echo '<meta http-equiv="refresh" content="0; url=http://roadtourfu.ai-info.ru/frontend/admin_panel/html/" />';


?>