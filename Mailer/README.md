<h2>Mailer</h2>

<h2>Установка и запуск</h2>

user и app изменить на свои:
```
1.  npm run build
2.  Настраиваем или оставляем .env, .htaccess
3.  Проверяем .htaccess в public
4.  Копируем копию из гита
5.  Перезалить дамп базы если были изменения или запустить миграции
6.  Исправить данные в таблице config
7.  composer install --optimize-autoloader --no-dev
8.  npm install
9.  php artisan config:cache
10. php artisan route:cache
11. php artisan view:cache
12. chown -R user:user /home/user/web/app/public_html
13. find /home/user/web/app/public_html -type d -exec chmod 755 {} \;
14. find /home/user/web/app/public_html -type f -exec chmod 644 {} \;
15. sudo supervisorctl reread
16. sudo supervisorctl update
17. sudo supervisorctl start laravel-worker:*
```
