<h2>Mailer</h2>

<h2>Установка и запуск</h2>

user и app изменить на свои:
```
1.  npm run build
2.  Настраиваем или оставляем .env, .htaccess
3.  Копируем копию из гита
4.  Перезалить дамп базы если были изменения или запустить миграции
5.  Исправить данные в таблице config
6.  composer install --opimize-autoloader --no-dev
7.  npm install
8.  php artisan config:cache
9.  php artisan route:cache
10.  php artisan view:cache
11. chown -R user:user /home/user/web/app/public_html
12. find /home/user/web/app/public_html -type d -exec chmod 755 {} \;
13. find /home/user/web/app/public_html -type f -exec chmod 644 {} \;
14. sudo supervisorctl reread
15. sudo supervisorctl update
16. sudo supervisorctl start laravel-worker:*
```
