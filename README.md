# vk_onlineStorePrototype

Тестовое задание на стажировку по вакансиям [«PHP-разработчик»](https://internship.vk.company/vacancy/842) и [«Бэкенд-разработчик»](https://internship.vk.company/vacancy/887) в команду СМБ.

## Схема системы

* [Ссылка на Bubbl.us](http://go.bubbl.us/e23433/3fda?/Тестовое-задание-в-VK-СМБ)
* [Изображение .PNG](https://github.com/Encritary/vk_onlineStorePrototype/blob/main/schema/schema.png)

На указанной схеме представлен прототип системы онлайн-магазина.

## Прототип API по оформлению заказа

Посмотреть код прототипа API по оформлению заказа можно в папке `src`.

Рекомендую начать изучение с [класса контроллера](https://github.com/Encritary/vk_onlineStorePrototype/blob/main/src/controllers/OrderController.php).

## Используемые технологии

### PHP

Для API предполагается использование PHP 8.x, возможно, каких-либо фреймворков для ускорения разработки.

### Nginx

Для хранения медиаконтента предполагается использовать сервера Nginx, возможно выстроение целой сети CDN 
(Content Delivery Network), чтобы ускорить отдачу большого количества медиаконтента и улучшить загружаемость по всей 
территории страны.

Плюсы подхода:
+ Nginx обладает отличной производительностью, когда дело касается статического контента.
+ Легко развернуть новые сервера, например, для расширения CDN.

Минусы подхода:
+ В случае с CDN — затраты на хостинг серверов по территории всей страны.
+ Возможна ситуация с устаревшим контентом — нужно продумать момент отдачи сигнала всем инстанциям CDN о том, что нужно 
подтянуть новую версию файла или удалить старую.

### MySQL

В качестве основной СУБД предполагается MySQL.

Её плюсы в том, что она полностью поддерживает все возможности SQL, есть возможность делать репликации для распределения 
нагурзки, легко настраивать и разворачивать, а также есть множество готовых решений для использования в коде.

В качестве минуса можно выделить долгий ответ на сложные SQL-запросы по очень большим таблицам. Но с этим может помочь 
кэш, о чём сказано далее.

### Redis

В качестве кэша предполагается Redis.

Redis будет хранить кэш наиболее частых и в то же время очень тяжёлых запросов, таких как, например, запрос каталога 
интернет-магазина. Для этого можно указывать в качестве ключа параметры сортировки каталога, а в качестве значения — 
готовый сериализованный ответ для API.

Redis очень часто используется как кэш за счёт своей производительности и удобства использования.