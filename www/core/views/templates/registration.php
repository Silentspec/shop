<?php
?>

<form method="post">
    <input type="login" name="login" value="<?=(\core\libs\Request::isPost())?$data['model']->login:''?>"><br>
    <input type="password" name="password"><br>
    <input type="password" name="password_confirm"><br>
    <input type="submit">
</form>