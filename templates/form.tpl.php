<form <?php print html_attr(($form['attr'] ?? []) + ['method' => 'POST']); ?>>

    <?php foreach ($form['fields'] ?? [] as $field_id => $field): ?>
        <label>
        <span class="label">
            <?php print $field['label']; ?>
        </span>
            <input <?php print html_attr(
                [
                    'name' => $field_id,
                    'type' => $field['type'],
                    'value' => $field['value'] ?? '',
                ] +
                $field['extra']['attr'] ?? []
            ); ?>
            >

            <?php if (isset($field['error'])): ?>
                <span class="error"><?php print $field['error']; ?></span>
            <?php endif; ?>
        </label>
    <?php endforeach; ?>

    <?php foreach ($form['buttons'] ?? [] as $button_id => $button): ?>
        <button
            <?php print html_attr(
                [
                    'name' => 'action',
                    'value' => $button_id,
                ] + $button['extra']['attr'] ?? []
            ); ?>
        >
            <?php print $button['title']; ?>
        </button>
    <?php endforeach; ?>
</form>
