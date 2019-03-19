<h1>Заметки</h1>
<div class="container">

    <div class="columns">
        <!-- Users-->

        <div class="users">
                <form class="useradd" action="/useradd" method="post">
                    <p>Добавить пользователя</p>
                    <input type="text" name="name">
                    <input type="submit" value="Добавить">
                </form>

            <?php foreach($users as $user):?>
                <div class="user">
                    <div class="user_name"><?=$user["name"]?></div>
                    <a href="/userdel/<?=$user["id"]?>">Del</a>
                    <a href="/usernotes/<?=$user["id"]?>">Show notes</a>
                </div>
            <?php endforeach;?>
        </div>

        <!-- Notes -->

        <div class="notes">
            <?php if (!is_null($notes)):?>

                    <form class="addnote" action="/noteadd" method="post">
                        <p>Добавить заметку</p>
                        <input type="hidden" name="user_id" value="<?=$user_id?>">
                        <input type="text" name="name">
                        <textarea name="desc" id="" cols="30" rows="10"></textarea>
                        <input type="submit" value="Добавить">
                    </form>

                <?php foreach ($notes as $note):?>
                    <div class="note">
                        <div class="note_name"><?=$note["name"]?></div>
                        <a href="/notedel/<?=$user_id?>/<?=$note["id"]?>">Del</a>
                        <a href="/noteshow/<?=$user_id?>/<?=$note["id"]?>">Show Detail</a>
                    </div>
                <?php endforeach ?>
            <?php endif;?>
        </div>

        <!--Full Note -->

        <div class="full_note">
            <?php if (!is_null($fullnote)):?>
            <p>Полная информация</p>
            <div class="full_note_name"><?=$fullnote[key($fullnote)]["name"]?></div>
            <div class="full_note_desc"><?=$fullnote[key($fullnote)]["desc"]?></div>
            <?php endif;?>
        </div>
    </div>
</div>

