<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Palmtree Form - Collection Example</title>
    <?= get_styles(); ?>
    <style>
        .remove-entry-link {margin-bottom:1rem;}
    </style>
</head>
<body>
<main>
    <div class="container mt-3">
        <h1>Palmtree Form - Simple Example</h1>
        <?php if ($success): ?>
            <div class="alert alert-success">Form submitted successfully</div>
        <?php endif; ?>
        <?php echo $form->render(); ?>
    </div>
</main>
<?= get_scripts(); ?>
<script src="/public/dist/js/palmtree-form.pkgd.js"></script>
<script>
    $(function () {
        $('.palmtree-form-collection').each(function () {
            $(this).palmtreeFormCollection({
                minEntries: 1,
                maxEntries: 4,
                labels: {
                    add: 'Add person'
                }
            });
        });
    });
</script>
</body>
</html>
