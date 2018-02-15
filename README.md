# MVC (Model-View-Controller)

![Диаграмма MVC](template/img/mvc.jpeg)

## Установка проекта

Для того, чтобы установить проект, сначала небходимо установить composer. Установить Composer Вы 
можете на [официальном сайте](https://getcomposer.org).

Если Вы уже установили Composer, выполните следующую команду в Terminale:

```bash
composer create-project sukhdug/sukhdug
```
Будет создана папка '''sukhdug''' в той директории, где Вы установили проект.
После того, как установили проект, надо выдавать права доступа. Сделайте это следующим образом:

```bash
sudo chown -R yourname.yoursurname:www-data /full/path/to/sukhdug
chmod -R g+ws /full/path/to/mvcblog
```

После этого создайте БД и пользователя в mysql с названием mvcblog. 
Это можно сделать следующим образом:

<pre><code class="sql">
CREATE DATABASE mvcblog DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
CREATE USER 'mvcblog'@'localhost' IDENTIFIED BY 'mvcblog_password';
GRANT ALL PRIVILEGES ON mvcblog.* TO 'mvcblog'@'localhost';
FLUSH PRIVILEGES;
</code></pre>

В файле config/db_params.php добавляете созданную конфигурацию БД и юзера.