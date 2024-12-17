<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$product.name|escape}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <img src="{$product.image}" alt="{$product.name}" class="img-fluid img-thumbnail">
        </div>
        <div class="col-md-6">
            <h1>{$product.name|escape}</h1>
            <p><strong>Категория:</strong> {$product.category|escape}</p>
            <p>{$product.description|escape}</p>
        </div>
    </div>

    <h3 class="mt-5">Комментарии</h3>
    {foreach $comments as $comment}
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{$comment.user_name|escape}</h5>
                <p class="card-text">{$comment.comment|escape}</p>
            </div>
        </div>
    {/foreach}

    <h4 class="mt-4">Добавить комментарий</h4>
    <form action="add_comment.php" method="POST" class="mb-4">
        <input type="hidden" name="product_id" value="{$product.id}">
        <div class="mb-3">
            <label for="user_name" class="form-label">Имя:</label>
            <input type="text" name="user_name" id="user_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Комментарий:</label>
            <textarea name="comment" id="comment" rows="3" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Добавить комментарий</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
