<div class="sidebar">
    <div class="sidebar__sidebar-item">
        <div class="sidebar-item__title">Сообщения по дням</div>
        <div class="sidebar-item__content" align="center">
            <?php get_calendar(true); ?>
        </div>
    </div>

    <div class="sidebar__sidebar-item">
        <div class="sidebar-item__title">Теги</div>
        <div class="sidebar-item__content">
            <ul class="tags-list">
                <?php
                $tags = get_tags();
                foreach ($tags as $tag) :
                ?>
                <li class="tags-list__item"><a href="<?php echo get_term_link($tag); ?>" class="tags-list__item__link"><?php echo $tag->name ?></a></li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>
</div>