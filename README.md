<h4>Кафе Friendly v.2.0</h4>
<p>Для тестирования программы вам необходим установленный composer на вашем локальном компьютере</p>
<p>Для тестирования программы вам необходим запущенный web-server (например, OpenServer) на вашем локальном компьютере</p>
<p>Системные требования:<br>
PHP 8.0 или выше;<br>
MySQL 5.7 или выше;<br>
Apache 2.4 или выше.</p>
<p><b>Установка проекта на локальный компьютер</b></p>
<p>1. Скачайте архив проекта и распакуйте его в каталог, например, <i>/friendly</i></p>
<p>2. Создайте базу данных <i>friendly</i> в MySQL</p>
<p>3. Импортируйте данные из <i>friendly.sql</i> файла в базу данных</p>
<p>4. Выполните коману в консоле из папки с проектом:<br>
<i>composer install --optimize-autoloader --no-dev</i></p>
<p>5. Выполните коману в консоле из папки с проектом:<br>
<i>php artisan key:generate</i></p>
<p>6. Выполните коману в консоле из папки с проектом:<br>
<i>php artisan storage:link</i></p>
<p>Адрес сайта на вашем локальном компьютере:<br>
<i>localhost:8000</i></p>
<p>Логин администратора: <i>admin@gmail.com</i><br>Пароль администратора: <i>rootadmin</i></p>
<p>Логин пользователя: <i>user@gmail.com</i><br>Пароль пользователя: <i>notrootuser</i></p>
<p>Измените email в Личном кабинете после входа для получения писем</p>
<p>Установка завершена, можете тестировать работу программы</p>
