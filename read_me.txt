Для установки достаточно залить файлы и установить модуль в админ части сайта, после етого карта сайта будет доступна по адрессу

site.ua/index.php?route=feed/fast_sitemap

Для того чтобы карта сайта была доступна по адресу

site.ua/sitemap.xml

Откройте файл .htaccess
и замените в нем

RewriteRule ^sitemap.xml$ index.php?route=feed/google_sitemap [L]

на

RewriteRule ^sitemap.xml$ index.php?route=feed/fast_sitemap [L]