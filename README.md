# MVC (Model-View-Controller)

![Диаграмма MVC](template/img/mvc.jpeg)

## Установка проекта

Для того, чтобы клонировать проект, выполните следующую команду в Terminale:

```bash
git clone https://github.com/sukhdug/mvcblog.git
```
После того, как склонировали проект, надо выдавать права доступа. Сделайте это следующим образом:

```bash
sudo chown -R yourname.yoursurname:www-data /full/path/to/mvcblog
chmod -R g+ws /full/path/to/mvcblog
```

Переходим в папку проекта. Далее устанавливаем зависимости. Сделайте это следующим образом:

если composer установлен глобально:

```bash
composer install
```

если composer установлен локально:

```bash
php composer.phar install
```

Установить Composer вы можете на [официальном сайте](https://getcomposer.org).