# Практические работы по МДК.09.01 (PHP)

<p align="center">
  <img src="https://img.shields.io/badge/PHP-%23777BB4.svg?style=flat-square&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/HTML5-%23E34F26.svg?style=flat-square&logo=html5&logoColor=white" alt="HTML5">
  <img src="https://img.shields.io/badge/CSS3-%231572B6.svg?style=flat-square&logo=css3&logoColor=white" alt="CSS3">
  <img src="https://img.shields.io/badge/Status-In%20Development-yellow?style=flat-square" alt="Status">
</p>
<p align="center">
  <img src="https://img.shields.io/badge/Apache-%23D22128.svg?style=flat-square&logo=apache&logoColor=white" alt="Apache">
  <img src="https://img.shields.io/badge/MySQL-%234479A1.svg?style=flat-square&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/XAMPP-FB7A24?style=flat-square&logo=xampp&logoColor=white" alt="XAMPP">
</p>

Практическая работа по модулю **09.01 «Разработка веб-приложений»**.
Проект реализован с использованием серверного языка **PHP**.

---

## 🛠 Технологический стек

* **Язык программирования:** PHP
* **Фронтенд:** HTML, CSS
* **Сервер:** Apache (XAMPP / OpenServer)
* **База данных:** MySQL
* **Инструменты:** phpMyAdmin

---

## 📂 Структура проекта

| Файл / Папка | Назначение                |
| ------------ | ------------------------- |
| `index.php`  | Главная страница          |
| `config.php` | Подключение к базе данных |
| `db/`        | SQL-скрипты               |
| `assets/`    | Стили, изображения        |
| `includes/`  | Подключаемые PHP-модули   |

---

## 🚀 Запуск проекта

Перед запуском убедитесь, что у вас установлен локальный сервер (**XAMPP** или аналог).

1. Клонируйте репозиторий:

```bash
git clone https://github.com/kenn1d/MDK.09.01.git
```

2. Переместите проект в папку сервера:

```bash
htdocs (для XAMPP)
```

3. Запустите Apache и MySQL

4. Импортируйте базу данных через phpMyAdmin:

* Откройте http://localhost/phpmyadmin
* Создайте БД
* Импортируйте `.sql` файл из папки `db`

5. Откройте проект в браузере:

```bash
http://localhost/MDK.09.01
```

---

## 📌 Особенности

* Работа с формами через PHP
* Подключение и взаимодействие с MySQL
* Разделение логики через include
* Базовая архитектура веб-приложения

---

<p>Разработчик: Кибанов М.Е.</p>  
Об авторе: @aka.ken
