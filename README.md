# telegram-bot-php / Телеграм Бот на PHP

Это простой бот для личных сообщений, который написан на языке PHP

---

### Установка и настройка бота

1. Скачиваем репозиторий:
```sh
$ git clone https://github.com/sahalinus/telegram-bot-php
```
и закидываем в какой-нибуть веб-хостинг с HTTPS (важно! ибо никак на Webhook без HTTPS)

2. Создание бота (Можно пропустить если есть бот).
Заходим в телегу, ищем `@botfather` и создаем бота
Пишем команду `/newbot` и пишем имя бота:

[![Screenshot 1](https://i.imgur.com/PgbMnOa.png)](https://i.imgur.com/PgbMnOa.png)

и берём токен из сообщения:

[![Screenshot 2](https://i.imgur.com/JtIndcS.png)](https://i.imgur.com/JtIndcS.png)

3. Установка Webhook

Пишем в URL-строке браузера:

```
https://api.telegram.org/bot<BOT_TOKEN>/setWebhook?url=https://<АДРЕС_ХОСТА>/<ПУТЬ_К_БОТУ>
```

[![Screenshot 3](https://i.imgur.com/ds89u5w.png)](https://i.imgur.com/ds89u5w.png)

4. Настройка бота

Меняем в файле `config.inc.php` токен бота:

[![Screenshot 4](https://i.imgur.com/XXn4YUf.png)](https://i.imgur.com/XXn4YUf.png)
