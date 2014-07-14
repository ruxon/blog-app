Приложение блога на Ruxon Framework
========

Установка при  помощи Composer
------------------------------
Выполните следующую команду:
~~~
php composer.phar create-project --prefer-dist --stability=dev ruxon/blog-app .
~~~


Настройка
---------
После установки необходимо настроить параметры соединения с базой данных.
Сделать это можно в файле ruxon/config/db.inc.php

После этого неоходимо установить модуль блога, выполнив в консоли:
~~~
php console/index.php Ruxon Install --module=Blog
~~~