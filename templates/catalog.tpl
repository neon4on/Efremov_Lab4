<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог товаров</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Каталог товаров</h1>

    <!-- Форма поиска -->
    <form method="GET" action="catalog.php" class="row mb-4">
        <div class="col-md-4">
            <input type="text" name="search" placeholder="Поиск..." class="form-control" value="{$filters.search|default:''}">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Искать</button>
        </div>
    </form>

    <!-- Фильтры -->
    <form method="GET" action="catalog.php" class="row g-3 mb-4">
        <div class="col-md-4">
            <label for="category" class="form-label">Категория:</label>
            <select name="category" id="category" class="form-select">
                <option value="">Все категории</option>
                {function name=render_categories categories=[] parent_id=null level=0}
                    {foreach $categories as $category}
                        {if $category.parent_id == $parent_id}
                            <option value="{$category.id}" class="category-level-{$level}" {if $filters.category == $category.id}selected{/if}>
                                {str_repeat('— ', $level)}{$category.name|escape}
                            </option>
                            {render_categories categories=$categories parent_id=$category.id level=$level+1}
                        {/if}
                    {/foreach}
                {/function}
                {render_categories categories=$categories}
            </select>
        </div>
        <div class="col-md-4">
            <label for="sort" class="form-label">Сортировка:</label>
            <select name="sort" id="sort" class="form-select">
                <option value="">Без сортировки</option>
                <option value="id_desc" {if $filters.sort == 'id_desc'}selected{/if}>Новые товары</option>
                <option value="id_asc" {if $filters.sort == 'id_asc'}selected{/if}>Старые товары</option>
            </select>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-success">Применить</button>
        </div>
    </form>

    <!-- Список товаров -->
    <h2>Список товаров</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Название</th>
                <th>Категория</th>
                <th>Описание</th>
                <th>Изображение</th>
            </tr>
        </thead>
        <tbody>
            {foreach $products as $product}
                <tr>
                    <td>
                        <a href="product.php?id={$product.id}" class="text-decoration-none text-dark">
                            {$product.name|escape}
                        </a>
                    </td>
                    <td>
                        {foreach $categories as $category}
                            {if $category.id == $product.category_id}{$category.name|escape}{/if}
                        {/foreach}
                    </td>
                    <td>{$product.description|truncate:100}</td>
                    <td>
                        <img src="{$product.image}" alt="{$product.name}" class="img-thumbnail" style="max-width: 100px;">
                    </td>
                </tr>
            {foreachelse}
                <tr>
                    <td colspan="4" class="text-center">Товары не найдены.</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
