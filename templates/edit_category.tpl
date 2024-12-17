<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать категорию</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Редактировать категорию</h1>

    <form action="edit_category.php?id={$category.id}" method="POST" class="row g-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Название категории:</label>
            <input type="text" name="name" id="name" class="form-control" value="{$category.name|escape}" required>
        </div>
        <div class="col-md-6">
            <label for="parent_id" class="form-label">Родительская категория:</label>
            <select name="parent_id" id="parent_id" class="form-select">
                <option value="">Нет</option>
                {foreach $categories as $cat}
                    <option value="{$cat.id}" {if $cat.id == $category.parent_id}selected{/if}>
                        {$cat.name|escape}
                    </option>
                {/foreach}
            </select>
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
