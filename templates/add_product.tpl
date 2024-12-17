<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить товар</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Добавить товар</h1>

    <form action="add_product.php" method="POST" enctype="multipart/form-data" class="row g-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Название:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="category" class="form-label">Категория:</label>
            <select name="category" id="category" class="form-select" required>
                <option value="">Выберите категорию</option>
                {foreach $categories as $category}
                    <option value="{$category.id}">{$category.name|escape}</option>
                {/foreach}
            </select>
        </div>
        <div class="col-12">
            <label for="description" class="form-label">Описание:</label>
            <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
        </div>
        <div class="col-md-6">
            <label for="image" class="form-label">Основное изображение:</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="gallery" class="form-label">Галерея изображений:</label>
            <input type="file" name="gallery[]" id="gallery" class="form-control" multiple>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success">Добавить товар</button>
            <a href="admin.php" class="btn btn-secondary">Назад</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
