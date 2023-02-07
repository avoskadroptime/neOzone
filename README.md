# neOzone
 

*Практика разработки онлайн-магазина neOzone, используя yii2.*
 - [x] ПР №1
 - [x] ПР №2
 - [x] ПР №3 
 - [x] ПР №4
 - [ ] ПР №5
 - [ ] ПР №6

**Схема бд** - https://disk.yandex.ru/i/ZUzCUuiKkHr0fQ
![схема бд](https://disk.yandex.ru/i/ZUzCUuiKkHr0fQ)

## Установка
Данный пример установки проходится через гит. Если у вас он не установлен, то можно это сделать из [официального сайта](https://git-scm.com/book/ru/v2/%D0%92%D0%B2%D0%B5%D0%B4%D0%B5%D0%BD%D0%B8%D0%B5-%D0%A3%D1%81%D1%82%D0%B0%D0%BD%D0%BE%D0%B2%D0%BA%D0%B0-Git), вот например для [Windows](https://git-scm.com/download/win) и [macOS](https://git-scm.com/download/mac).
Либо просто скачиваете zip файл и распаковываете в нужном месте.

Прописываем команды в **cmd**, перемещаясь в нужный каталог:

    git clone https://github.com/avoskadroptime/neOzone.git
    cd neOzone/basic
    composer install
Последняя команда необходима для создания у себя папки **vendor**.

### Для установки бд:
1. скачиваете этот [файл](https://disk.yandex.ru/d/N5XVNro9n-nuwg) и зайдите в phpMyAdmin;
2. создаете новую базу данных с названием neOzone и с кодировкой utf8mb4_general_ci;
3. импортируете ранее скаченный файл;


## Спецификация для сервера
- PHP -- 7.3
- APACHE -- 2.4-PHP_7.2-7.4
- MySql -- 8.0-Win10
