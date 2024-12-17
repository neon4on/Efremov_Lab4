<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Панель администратора</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Панель администратора</h1>
    <p>Вы вошли как: <strong>{$admin_username}</strong></p>
    <a href="logout.php" class="btn btn-danger mb-4">Выйти</a>

    <!-- Список товаров -->
    <h2>Список товаров</h2>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Категория</th>
                <th>Описание</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            {foreach $products as $product}
                <tr>
                    <td>{$product.id}</td>
                    <td>{$product.name|escape}</td>
                    <td>{$product.category|escape}</td>
                    <td>{$product.description|truncate:50}</td>
                    <td>
                        <a href="edit_product.php?id={$product.id}" class="btn btn-sm btn-primary">Редактировать</a>
                        <a href="delete_product.php?id={$product.id}" class="btn btn-sm btn-danger"
                           onclick="return confirm('Удалить этот товар?')">Удалить</a>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>

    <!-- Категории -->
    <h2>Категории</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            {foreach $categories as $category}
                <tr>
                    <td>{$category.id}</td>
                    <td>{$category.name|escape}</td>
                    <td>
                        <a href="edit_category.php?id={$category.id}" class="btn btn-sm btn-primary">Редактировать</a>
                        <a href="delete_category.php?id={$category.id}" class="btn btn-sm btn-danger"
                           onclick="return confirm('Удалить категорию?')">Удалить</a>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>

    <!-- Добавить категорию -->
    <h3>Добавить категорию</h3>
    <form action="add_category.php" method="POST" class="mb-4">
        <div class="mb-3">
            <label for="name" class="form-label">Название категории:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Добавить</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
