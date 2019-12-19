<div class="sqr_bckground">
    <?php foreach ($thermo as $figura): ?>
        <div class="form <?php print $figura['form'] . ' ' . $figura['color']; ?>">
            <?php if (isset($figura['text'])): ?>
                <span><?php print $figura['text']; ?></span>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>



