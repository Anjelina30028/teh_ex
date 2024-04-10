<?php
use utils\Connect\Connect;

$items = Connect::get();
?>
    <h1 class="header">Телефонный справочник</h1>

    <div class="title-form">
    <h1>Добавьте номер телефона</h1>
    <form action="/add" method="post">
        <input type="text" name="name" id="name" autocapitalize="words" placeholder="ООО СибКом" required>    
        <input type="tel" name='phone' minlength="7"  pattern="+7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}" id="phone" placeholder="+7 933 333 33 33" required>
        <button type="submit"> Добавить </button>
    </form>
    </div>

<div class="name-tel">
<?php 
         if(isset($item)){       
            foreach ($items as $item){?>
            <div class="item">
                <h3><?= $item['name']?></h3>
                <h3><?= $item['phone']?></h3>
                <h3>
                    <form action="/delete" method="post">
                        <input type="hidden" value="<?= $item['phone']?>" name="phone">
                        <button type="submit">Удалить</button>
                    </form>   
                </h3>
            </div>
            <?php
            }
 }else{
       ?>
       <h1>На данный момент отсутствуют номера</h1>
       <?php
    }
    ?>
</div>


