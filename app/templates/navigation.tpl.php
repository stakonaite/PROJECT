
<nav>
    <div class="left">
        <?php foreach ($data['left'] as $link): ?>

            <a class="nav-btn" href="<?php print $link['url']; ?>"><?php print $link['title']; ?></a>
        <?php endforeach; ?>
    </div>

    <div class="right">
        <?php foreach ($data['right'] as $link): ?>
            <a class="nav-btn" href="<?php print $link['url']; ?>"><?php print $link['title']; ?></a>
        <?php endforeach; ?>
    </div>
</nav>