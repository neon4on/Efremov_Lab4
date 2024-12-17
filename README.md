# Электронный каталог

Проект "Электронный каталог" — это веб-приложение для управления товарами с возможностью добавления, редактирования, удаления товаров и категорий, а также просмотра товаров и комментариев к ним.

## Установка и настройка проекта

### 1. Установка XAMPP
Для запуска проекта требуется локальный сервер и база данных MySQL.
- [Скачать XAMPP](https://www.apachefriends.org/index.html)
- Установить и запустить Apache и MySQL через панель управления XAMPP.

### 2. Клонирование проекта
Склонируйте репозиторий с проектом на ваш компьютер

### 3. Настройка базы данных

1. Откройте **phpMyAdmin** (по умолчанию доступно по адресу http://localhost/phpmyadmin).
2. Создайте базу данных с именем `catalog_lab`.

**SQL-запросы для создания таблиц:**

```sql
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,
    category_id INT NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    parent_id INT DEFAULT NULL,
    FOREIGN KEY (parent_id) REFERENCES categories(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS product_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    user_name VARCHAR(100) NOT NULL,
    comment TEXT NOT NULL,
    parent_id INT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    FOREIGN KEY (parent_id) REFERENCES comments(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, password) VALUES ('admin', MD5('password123'));
```

### 4. Настройка конфигурации базы данных

Откройте файл `src/config/db.php` и убедитесь, что настройки подключения корректны:

```php
<?php
$host = 'localhost';
$db   = 'catalog_lab';
$user = 'root';
$pass = ''; // Пароль по умолчанию пустой
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
```

### 5. Запуск проекта
1. Запустите **XAMPP** и включите модули Apache и MySQL.
2. Поместите проект в папку `htdocs` (например, `C:/xampp/htdocs/catalog_lab`).

## Навигация по страницам

1. **Авторизация администратора**:
   - URL: `http://localhost/catalog_lab/login.php`
   - Логин: `admin`
   - Пароль: `password123`

2. **Панель администратора**:
   - URL: `http://localhost/catalog_lab/admin.php`

3. **Каталог товаров**:
   - URL: `http://localhost/catalog_lab/catalog.php`

4. **Просмотр товара и комментариев**:
   - URL: `http://localhost/catalog_lab/product.php?id=1` (где `id` — ID товара).

## Структура проекта

```
/catalog_lab
├── assets/
│   └── css/
│       └── styles.css
├── smarty/
│   ├── libs/
│   └── templates_c/
├── src/
│   └── config/
│       └── db.php
├── templates/
│   ├── admin.tpl
│   ├── add_product.tpl
│   ├── edit_product.tpl
│   ├── edit_category.tpl
│   ├── edit_comment.tpl
│   ├── catalog.tpl
│   └── product.tpl
├── add_product.php
├── edit_product.php
├── delete_product.php
├── add_category.php
├── edit_category.php
├── delete_category.php
├── add_comment.php
├── edit_comment.php
├── delete_comment.php
├── product.php
├── catalog.php
├── admin.php
├── login.php
└── logout.php
```

## Зависимости
Проект не использует сторонние библиотеки, кроме:
- **Smarty** (шаблонизатор)
- **Bootstrap 5.3** (для стилизации интерфейса)

## Функции

- Добавление/редактирование/удаление товаров, категорий и комментариев.
- Фильтрация и сортировка товаров.
- Авторизация администратора.
- Вложенные комментарии и категории.
