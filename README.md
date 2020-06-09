# telegram-bot-php / Телеграм Бот на PHP

Это простой бот для личных сообщений, который написан на языке PHP

---

## Установка и настройка бота

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

---

## Функции в `functions.inc.php`

### `apiCall($method, $params);`

Вызов метода Telegram Bot API (методы https://core.telegram.org/bots/api).

| Параметр | Тип | Необходимый? | Описание |
| ----- | ----- | ----- | ----- |
| `$method` | String | Да | Имя метода для вызова |
| `$params` | Array | По необходимости | Массив с параметрами |

---

### `getMe();`

Возвращает информацию бота.

| Параметр | Тип | Необходимый? | Описание |
| ----- | ----- | ----- | ----- |
| - | - | - | - |

---

### `getMyCommands();`

Возвращает команды бота.

| Параметр | Тип | Необходимый? | Описание |
| ----- | ----- | ----- | ----- |
| - | - | - | - |

---

### `sendMessage($chat_id, $text, $parse_mode, $reply_msgid, $disable_webpreview);`

Отправляет сообщение в Чат или в ЛС.

| Параметр | Тип | Необходимый? | Описание |
| ----- | ----- | ----- | ----- |
| `$chat_id` | Integer | Да | Айди Чата или Пользователя |
| `$text` | String | Да | Текст сообщения |
| `$parse_mode` | String | Опционально | Режим разбора в тексте сообщения, `markdown` или `html` |
| `$reply_msgid` | Integer | Опционально | Айди сообщении для отвечание |
| `$disable_webpreview` | Boolean | Опционально | Отключить (1) или Включить (0) предварительный просмотр ссылок в этом сообщении |

Например:
```php
sendMessage($chat_id, "Hewwo!");

sendMessage($chat_id, "*Hello*, `username`! ``` code ```", "markdown");

sendMessage($chat_id, "Pong!", "", $message_id);
```

---

### `sendPhoto($chat_id, $photo, $caption, $reply_msgid);`

Отправляет фото.

| Параметр | Тип | Необходимый? | Описание |
| ----- | ----- | ----- | ----- |
| `$chat_id` | Integer | Да | Айди Чата или Пользователя |
| `$photo` | String | Да | Путь до картинки |
| `$caption` | String | Опционально | Текст сообщения |
| `$reply_msgid` | Integer | Опционально | Айди сообщении для отвечание |

Например:
```php
sendPhoto($chat_id, "./static/hatkid.png", "Hat Kid!");
```

---

### `sendAudio($chat_id, $audio, $caption, $reply_msgid, $performer, $title, $thumb);`

Отправляет аудиозапись.

| Параметр | Тип | Необходимый? | Описание |
| ----- | ----- | ----- | ----- |
| `$chat_id` | Integer | Да | Айди Чата или Пользователя |
| `$audio` | String | Да | Путь до аудиозаписи |
| `$caption` | String | Опционально | Текст сообщения |
| `$reply_msgid` | Integer | Опционально | Айди сообщении для отвечание |
| `$performer` | String | Опционально | Исполнитель |
| `$title` | String | Опционально | Название |
| `$thumb` | String | Опционально | Путь к картинки для предпросмотра |

Например:
```php
sendPhoto($chat_id, "./static/song.mp3", "Song: Mtech - Pressure", 0, "Mtech", "Pressure");
```

---

### `sendDocument($chat_id, $document, $caption, $reply_msgid, $thumb);`

Отправляет документ или GIF-картинку.

| Параметр | Тип | Необходимый? | Описание |
| ----- | ----- | ----- | ----- |
| `$chat_id` | Integer | Да | Айди Чата или Пользователя |
| `$document` | String | Да | Путь до документа |
| `$caption` | String | Опционально | Текст сообщения |
| `$reply_msgid` | Integer | Опционально | Айди сообщении для отвечание |
| `$thumb` | String | Опционально | Путь к картинки для предпросмотра |

Например:
```php
sendDocument($chat_id, "./static/document.docx", "Word Document.");
```

---

### `sendVideo($chat_id, $video, $caption, $reply_msgid, $thumb, $streaming);`

Отправляет видеозапись.

| Параметр | Тип | Необходимый? | Описание |
| ----- | ----- | ----- | ----- |
| `$chat_id` | Integer | Да | Айди Чата или Пользователя |
| `$video` | String | Да | Путь до видеозаписи |
| `$caption` | String | Опционально | Текст сообщения |
| `$reply_msgid` | Integer | Опционально | Айди сообщении для отвечание |
| `$thumb` | String | Опционально | Путь к картинки для предпросмотра |
| `$streaming` | Boolean | Опционально | Поддерживает стриминг?; 1 - Да, 0 - Нет |

Например:
```php
sendVideo($chat_id, "./static/video-720p.mp4");
```

---

### `sendVoice($chat_id, $audio, $caption, $reply_msgid);`

Отправляет голосовой запись.

| Параметр | Тип | Необходимый? | Описание |
| ----- | ----- | ----- | ----- |
| `$chat_id` | Integer | Да | Айди Чата или Пользователя |
| `$audio` | String | Да | Путь до аудиозаписи |
| `$caption` | String | Опционально | Текст сообщения |
| `$reply_msgid` | Integer | Опционально | Айди сообщении для отвечание |

Например:
```php
sendVideo($chat_id, "./static/voice.ogg");
```

---

### `sendSticker($chat_id, $sticker, $reply_msgid, $disable_notification);`

Отправляет стикер.

| Параметр | Тип | Необходимый? | Описание |
| ----- | ----- | ----- | ----- |
| `$chat_id` | Integer | Да | Айди Чата или Пользователя |
| `$sticker` | String | Да | Путь до стикера в формате WEBP |
| `$reply_msgid` | String | Опционально | Айди сообщении для отвечание |
| `$disable_notification` | Boolean | Опционально | Отключает уведомление; 1 - Отключает, 0 - Включает |

Например:
```php
sendSticker($chat_id, "./static/sticker-13.webp");
```

---

### `sendDice($chat_id, $reply_msgid, $emoji, $disable_notification);`

Отправляет кость (Для ПК юзеров).

| Параметр | Тип | Необходимый? | Описание |
| ----- | ----- | ----- | ----- |
| `$chat_id` | Integer | Да | Айди Чата или Пользователя |
| `$reply_msgid` | String | Опционально | Айди сообщении для отвечание |
| `$emoji` | Array | Опционально | Массив смайликов |
| `$disable_notification` | Boolean | Опционально | Отключает уведомление; 1 - Отключает, 0 - Включает |

Например:
```php
sendDice($chat_id);
```

---

### Всё...
