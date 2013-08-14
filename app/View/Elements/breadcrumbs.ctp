<?php if(!empty($list)):?>
    <?php
    $names = array_keys($list);
    $current_name = array_pop($names);
    ?>
    <div class="breadcrumbs">
        <ul>
            <li class="home"><?php echo $this->Html->link(__('SO HOT KOSHIEN', true), '/')?></li>
        <?php foreach($list as $name => $link):?>
            <?php if($name == $current_name):?>
                <li class="current"><?php echo h(__($name, true)) ?></li>
            <?php else:?>
                <li><?php echo !empty($link) ? $this->Html->link(__($name, true), $link) : h(__($name, true)) ?></li>
            <?php endif;?>
        <?php endforeach;?>
        </ul>
    </div>
<?php endif;?>
