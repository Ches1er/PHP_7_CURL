<?php

include "Users.php";

$users = new Users();
$showUsers = $users->showUsers();

?>
<div class="users">
    <?php foreach ($showUsers as $user):?>
    <div class="user"><?=$user["name"]?></div>
</div>
<?php endforeach;?>
