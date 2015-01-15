<!DOCTYPE html>
<html>
<head>
    <title>Upload Test</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
    <?php echo Form::file('file') ?>
    <?php echo Form::submit('提交') ?>
    </form>
</body>
</html>