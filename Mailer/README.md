<h2>Mailer</h2>

<h2>Установка и запуск</h2>

user и app изменить на свои:

1.  Настраиваем или оставляем .env, .htaccess
2.  Копируем копию из гита
3.  Перезалить дамп базы если были изменения или запустить миграции
4.  Исправить данные в таблице config
5.  composer install --opimize-autoloader --no-dev
6.  npm install
7.  php artisan config:cache
8.  php artisan route:cache
9.  php artisan view:cache
10. chown -R user:user /home/user/web/app/public_html
11. find /home/user/web/app/public_html -type d -exec chmod 755 {} \;
12. find /home/user/web/app/public_html -type f -exec chmod 644 {} \;
13. sudo supervisorctl reread
14. sudo supervisorctl update
15. sudo supervisorctl start laravel-worker:*