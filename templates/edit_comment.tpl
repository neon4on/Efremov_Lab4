<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать комментарий</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Редактировать комментарий</h1>

    <form action="edit_comment.php?id={$comment.id}" method="POST" class="row g-3">
        <div class="col-md-6">
            <label for="user_name" class="form-label">Имя пользователя:</label>
            <input type="text" name="user_name" id="user_name" class="form-control" value="{$comment.user_name|escape}" required>
        </div>
        <div class="col-12">
            <label for="comment" class="form-label">Комментарий:</label>
            <textarea name="comment" id="comment" rows="5" class="form-control" required>{$comment.comment|escape}</textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            <a href="admin.php" class="btn btn-secondary">Назад</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
