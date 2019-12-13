<div class="sqr_bckground">
    <?php foreach ($thermo as $figura): ?>
        <div class="form <?php print $figura['form'] . ' ' . $figura['color']; ?>">
            <span> <?php print $figura['text']; ?></span>
        </div>
    <?php endforeach; ?>
</div>



