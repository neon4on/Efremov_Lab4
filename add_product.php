<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/smarty/libs/Smarty.class.php';
require_once __DIR__ . '/src/config/db.php';

$smarty = new \Smarty\Smarty();
$smarty->setTemplateDir('./templates/');
$smarty->setCompileDir('./templates_c/');

// Обработка формы добавления товара
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'] ?? null;
    $price = $_POST['price'];

    if (!$category) {
        die("Категория не выбрана. Пожалуйста, вернитесь и выберите категорию.");
    }

    // Загружаем основное изображение
    $mainImage = $_FILES['image'];
    $mainImagePath = 'uploads/' . uniqid() . '_' . basename($mainImage['name']);
    move_uploaded_file($mainImage['tmp_name'], $mainImagePath);

    // Определяем MIME-тип файла
    $imageType = mime_content_type($mainImagePath);

    // Поддерживаемые типы
    if ($imageType === 'image/jpeg') {
        $image = imagecreatefromjpeg($mainImagePath);
    } elseif ($imageType === 'image/png') {
        $image = imagecreatefrompng($mainImagePath);
    } else {
        die("Неподдерживаемый формат изображения. Пожалуйста, загрузите файл JPEG или PNG.");
    }

    // Накладываем ватермарку
    $watermarkPath = 'assets/watermark.png';
    if (file_exists($watermarkPath)) {
        $watermark = imagecreatefrompng($watermarkPath);

        // Координаты для размещения ватермарки
        $sx = imagesx($watermark);
        $sy = imagesy($watermark);
        $x = imagesx($image) - $sx - 10;
        $y = imagesy($image) - $sy - 10;

        // Накладываем ватермарку
        imagecopy($image, $watermark, $x, $y, 0, 0, $sx, $sy);

        // Сохраняем изображение с ватермаркой
        if ($imageType === 'image/jpeg') {
            imagejpeg($image, $mainImagePath);
        } elseif ($imageType === 'image/png') {
            imagepng($image, $mainImagePath);
        }

        // Очищаем память
        imagedestroy($image);
        imagedestroy($watermark);
    } else {
        die("Ватермарка не найдена по пути: $watermarkPath");
    }

    // Вставляем данные товара в базу
    $stmt = $pdo->prepare("INSERT INTO products (name, description, image, category_id, price) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $description, $mainImagePath, $category, $price]);
    $productId = $pdo->lastInsertId();

    // Обработка галереи дополнительных изображений
    if (isset($_FILES['gallery']) && is_array($_FILES['gallery']['tmp_name'])) {
        foreach ($_FILES['gallery']['tmp_name'] as $key => $tmpName) {
            if (!empty($tmpName)) {
                $galleryImagePath = 'uploads/' . uniqid() . '_' . basename($_FILES['gallery']['name'][$key]);
                move_uploaded_file($tmpName, $galleryImagePath);

                $stmt = $pdo->prepare("INSERT INTO product_images (product_id, image_path) VALUES (?, ?)");
                $stmt->execute([$productId, $galleryImagePath]);
            }
        }
    }

    echo "Товар успешно добавлен!";
    exit;
}

// Загрузка категорий для формы
$categories = $pdo->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
$smarty->assign('categories', $categories);
$smarty->display('add_product.tpl');
?>
