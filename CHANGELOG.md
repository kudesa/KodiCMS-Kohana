### 13.82.135
 * [feature] Доработан алгоритм генерации ссылки в списке ГД документов, ранее для генерации ссылки использовалось поле "Поле идентификатора", в котором указывались ключи полей через запятую, которые добавлялись в ссылку через слеш (/), теперь для генерации ссылки можно использовать только поле "Страница документа (URI)" формата `/section/:field_name` -  `/news/:category.slug/:id` или если поле представляется из себя массив `author => array('username' => '.....')` - `/section/:author..username`
 * [feature] Оптимизирован запрос на подсчет кол-ва записей в разделе "Гибридные данные", также исправлены проблемы с фильтрацией по определенным типам полей.
 * [feature] Если по каким то причинам ГД поле не добавилось в таблицу, при редактировании этого поля будет показано уведомление и предложение исправить эту проблему
 * [feature] Для кнопки отправления API запроса добавлена возможность передачи параметров `<button data-api-url="..." data-method="POST" data-params="{idt:44}">....</button>`
 * [feature] При сохранении контента части страницы - если для выбранного редактора текста существует класс Filter_{filter_name}, то текст будет обработан методом apply данного класса, если класс не существует, контент будет обработан фильтром по умолчанию Folter_Default. Такми образом в систему можно добавить markdown редактор текста и создать класс для преобразования текста в HTML.
 * [feature] В шаблон по умолчанию для виджета "Меню" заменена ссылка на страницу с `url` на `url`, а так-же добавлен вывод связанного виджета.
 * [feature] В метод Date::format добавлена возможность передачи массива сформированного функцией `date_parse_from_format`
 * [feature] Добавлена jQuery функция для расчета высоты контейнера
 * [feature] При отсутсвии прав на запись в папку шаблонов или сниппетов добавлен вывод сообщения и блокировка кнопки создания файла
 * [feature] Новый виджет для ГД раздела - Архив (по дням, годам, месяцам).
 * [feature] Расширен список источников, откуда фильтры списка ГД могут получать данные (GET, POST, Behavior, CTX)
 * [feature] Добавлен редактор текста ckeditor
 * [feature] Улучшения при редактировании страницы.  отсутсвии шаблона у страницы, будет указано, что он отсутсвует. При редактировании мета информации и использовании параметров теперь показывается текст как это будет выглядеть при выводе страницы
 * [feature] Добавлена страница настроек рабочего стола и новые виджеты для рабочего стола "Активность пользователей", "Профайлер", "Погода"
 * [feature] Добавленыв возможность фильтрации ГД документов по полю типа "Select"
 * [feature] issue #293 Использование Gridster для виджетов рабочего стола
 * [feature] issue #324
 * [feature] issue #281
 * [feature] Добавлены скелеты для разработки собсвенных плагинов плагинов
 * [feature] В класс Sitemap добавлен метод callback для возможности использования собственный функций или классов для изменения массива.
 * [feature] issue #323 Добавлена возможность связывать стрвницы в виджете "Меню" с другими виджетами
 * [update] Обновление Kohana до версии 3.3.3.1
 * [update] Обновление dropzone до версии 3.12.0
 * [update] Обновление Twitter Bootstrap до версии 3.3.1
 * [update] Обновление библиотеки подсветки синтаксиса Ace, а также добавлены настройки изменения темы редактора. Изменено сочетание клавиш для перехода в полноэкранный режим на CTRL+SHIFT+F
 * [refactoring] Оптимизация загрузки виджетов
 * [refactoring] Моудль API
 * [fix] Исправлена проблема из-за которой при создании ГД полей не создается поле в таблице документа
 * [fix] При создании ГД поля "Select" - убрана возможность добавления значений
 * [fix] Исправлена проблема с закрытием всплывающего окна редактирования сниппета
 * [fix] issue #322
 * [fix] Исправлены проблемы с https
 * [fix] Поправлен css для частей страницы, а также сворачивание части исправлено на двойной клик по заголовку, а не по всему блоку
 * [fix] Добавлен недостающий перевод
 * [fix] Исправлена орфография

### 13.55.110
 * [feature] Доработка модуля "Части страницы (Page parts)". Замена редктирования названия по двойному клику, на  кнопку на панели. Двойной клик по тулбару приводит к сворачиванию (разворачиванию) блока с контентом (аналог кнопки сворачивания(разворачивания)). Возможность сортировки частей страницы перетаскиванием (Необходимо обновить структуру таблицы page_parts в разделе "обновление/ База данных" либо вручную `ALTER TABLE `page_parts` ADD `position` INT(11) NOT NULL DEFAULT '0' ;`)
 * [feature] Добавлена тестовая поддержка драйвера БД SQLite
 * [feature] Улучшена валидация настроек вкладки Email, при изменении драйвера отправки писем происходит скрытие кнопки отправки тестового письма до сохранения настроек.
 * [feature] Доработан механизм подсветки полей с ошибками, если поле находится во вкладке, происходит подстветка самой вкладки (Например в настройках если много вкладок, легче понять в какой именно ошибки).
 * [feature] Обновлена страница проверки окружения в инсталляторе системы
 * [feature] Отключение полнотекстового поиска через конфиг
 * [feature] Доработан дизайн модальных окон в плагине RedactorJS, а также вынос инициализации пакета скриптов в `init.php`
 * [feature] При установке системы из списка плагинов убраны те, которые не могут быть установлены
 * [feature] В файл htaccess добавлены примеры редиректов c www на non-www и обратно
 * [feature] Добавлен новый тип окружения TESTING, который включает профайлер и не выключает кеширование (включается через htaccess)
 * [feature] В ГД поле "Image" теперь можно добавлять водяные знаки issue #309
 * [feature] Добавлен метод для сжатия JS скрипртов в файл
 * [feature] Добавлена задача для обновления структуры БД через консоль php index.php --task=update:database issue #312
 * [feature] Добавлена сборка воедино всех CSS файлов, а также в htaccess настройки для включения кешироавния css|js и картинок
 * [feature] Добавлена возможность отключения отправки заголовка 'X-Powered-CMS' через конфиг файл. Для отключения, необходимо изменить занчение в конфиг файле global.php на 'x_powered_header' => Config::NO.
 * [feature] В настройках системы добавлена кнопка очистки всех логов в БД
 * [feature] Доработан поиск по документам раздела "Гибридные документы"
 * [feature] Добавлена возможность подключать кастомные папки в файловый менеджер через конфиг elfinder.php (пример подключения есть в плагине skeleton)
 * [feature] В плагине Гибридные Документы при загрузке документа добавлена возможность подгружать для каждого поля css и js файлы
 * [feature] Драйвер поиска SphinxSearch + Генератор конфига
 * [feature] Генератор API ключей
 * [refactoring] Изменение месторасположения ГД поля "Яндекс карты". Если у вас было созданно такое поле, то необходимо исправить его ключ в таблице БД dsfields на map_yandex
 * [refactoring] Переделан модуль поиска, теперь для поиска данных используется отдельный запрос и возвращаются ID записей
 * [refactoring] модуль Sidebar
 * [fix] Исправлена ошибка из за которой всегда проверялся URL_SUFFIX
 * [fix] Исправлена оишбка из за которой неправильно отображался статус неопубликованных документов
 * [fix] Исправлена ошибка задвоения кнопки файлового менеджера
 * [fix] Исправлены ошибки в плагине Page fields
 * [fix] Исправлена ошибка из-за которой не работал виджет "Обработчик создания ГД"
 * [fix] Исправлена ошибка с задвоением ковычек при создании дампа БД  в плагине Backup
 * [fix] Исправлено проставление значения текущей даты для полей типа Date, Time, DateTime
 * [fix] issue #295
 * [fix] issue #296
 * [fix] issue #297
 * [fix] issue #298
 * [fix] issue #300
 * [fix] issue #301
 * [fix] issue #302
 * [fix] issue #304
 * [fix] issue #305
 * [fix] issue #306
 * [fix] issue #310
 * [fix] issue #311
 * [fix] issue #313
 * [fix] issue #315
 * [fix] issue #316
 * [fix] issue #317
 * [fix] issue #319
 * [fix] issue #321
 * [fix] Исправление ошибок
 * [remove] модуль Bootstrap 

### 12.33.70
 * [feature] Задача по очистке кеша через CLI и для менеджера задач `php index.php --task=cache::clear` В качестве параметра можно передать тип кеша, который необходимо очистить `--type=all` (all, file, cache_driver_type, routes, profiler )
 * [feature] Вывод типа виджета на странице редактирования
 * [feature] issue #289
 * [feature] В настройках Email добавлена кнопка отправки тестового письма, спасибо @igk1972
 * [feature] В CTX добавлена возможность получать параметры по строке вида `url_segments[0]`
 * [feature] Добавлена возможность передачи кастомных параметров в фильтры виджета ГД документов
 * [feature] Доработан модуль Behavior. Теперь роуты можно указывать не только внутри объекта типа страницы, но и в конфиг файле behaviors, также в настройках роута в качестве вызываемого метода можно указывать статический класс, при вызове в него будет передан текущий объект Behavior
 * [feature] В настройках пользователя добавлен выбор темы админ панели
 * [feature] В разделе Datasource добавлена возможность создавать папки для группировки разделов
 * [refactoring] Переработан механизм добавления Javascript переменных в шаблон админ панели через контроллер.
 * [refactoring] Hybrid Datasource
 * [refactoring] `Model_Page_Front::find`
 * [refactoring] `Meta`
 * [refactoring] Инсталлятор через CLI
 * [fix] При нахождении в разделе Update структура БД больше не кешируется
 * [fix] Исправлена ошибка с раскрытим дочерник страниц в разделе "Страницы"
 * [fix] Исправлена ошибка из за которой при обновлении ГД документа сбрасывалась дата создания
 * [fix] При сохранении шаблонов и сниппетов проихсодит транслитерация имени и очистка от лишних символов
 * [fix] Добавлены недостающие переводы
 * [fix] Исправлена опечатка из за которой не работало кеширование на стороне браузера, спасибо @igk1972
 * [fix] Доработан метод URL::frontend, теперь префикс ставится корректно для URL содержащих query_string
 * [fix] Добавлена рамка вокруг редактора текста RedactorJS
 * [fix] Fix Userguide plugin
 * [fix] Исправлена кнопка удаления пользователя
 * [fix] Fix hybrid profile widget
 * [fix] Исправлена проблема возникающая во время установки системы с использованием преффикса БД
 * [fix] Исправлена проблема с удалением пакетов из виджета
 * [fix] Исправлены иконки в списке страниц
 * [fix] issue #280
 * [fix] issue #287
 * [fix] issue #290
 * [fix] issue #292
 * [fix] Исправлена проблема с автоматической очисткой кеша. Теперь при активации плагина файлы подключаются корректно

### 12.20.37
 * [feature] Обновление Twitter Bootstrap до версии 3.2.3
 * [feature] Добавлен рабочий стол (Dashboard) в админ панели
 * [feature] Виджеты обработчики больше не требуют помещения их на страницу, а доступны по сгенерированному для них URL
 * [feature] Добавлена возможность смены темы админ панели (пока только через конфиг файл /cms/modules/kodicms/config/global)
 * [feature] Расширена работа с Assets_Package
 * [feature] Новый тип ГД поля "Цвет"
 * [feature] Добалвены новые методы класса HTML и Form: Form::token(), HTML::ol(...), HTML::ul(...)
 * [feature] Улучшен механизм работы с Meta полями страниц и добавления в них дополнительных параметров из других разделов
 * [feature] Новый тип страницы "Профиль пользователя"
 * [feature] Добавлен виджет "ГД профиль пользователя"
 * [feature] Вывод в настройках виджета списка переменных, которые можно использовать в шаблоне
 * [feature] Добавлена возможность ГД поле типа User сделать уникальным
 * [feature] Добавлена возможность подключения Assets пакетов в настройках виджета
 * [feature] В обработчике создания и обновления ГД документа добавлена возможность указания полей, которые должны обновляться (редактироваться)
 * [feature] Оптимизация работы объекта frontend страницы Model_Page_Front
 * [feature] Оптимизация загрузки 404 и 401
 * [feature] Расширена работа с правами пользователя к разделам Datasource. Исправлены проблемы с разгранечением прав доступа
 * [feature] Добавлена проверка наличия в URL указанного суффикса, включается в настройках сайта.
 * [feature] Добавлена возможность настройки прав дотсупа для роли "Login"
 * [feature] Добавлена таблица для хранения пользовательских данных (Например, расположение виджетов, личные настройки и т.д.)
 * [refactoring] Datasource
 * [refactoring] Datasource_Hybrid_Field
 * [refactoring] URL
 * [refactoring] Block
 * [fix] Модуль ACE мигрировал в ядро системы
 * [fix] Исправлен перевод
 * [fix] Исправлена проблема при создании ГД разделов и полей при использовании префикса таблиц в БД (issue #267)
 * [fix] Исправлено множество мелких ошибок

### 11.16.22
 * [feature] Добавлена возможность в настройках страницы указать URL для редиректа при запросе этой страницы. (Необходимо обновить таблицу в БД)
 * [feature] Контррллер Front из модуля KodiCMS перемещен в Pages
 * [feature] Обновление библиотеки Font-awesome до последней версии
 * [feature] Добавлена возможность выбирать тип хранилища для сессий (database, native, cookie). (Необходимо обновить таблицу в БД)
 * [feature] Изменение в логики хранения связанных документов для поля Array. (Необходимо применить патч https://github.com/KodiCMS/patches/blob/master/hybrid_field_array.php и обновить таблицу в БД)
 * [feature] В виджете "Меню" добавлена возможность выводить подменю нужного уровня уникального для каждой страницы.
 * [feature] Добавлена JavaScript валидация полей в инсталляторе CMS
 * [feature] В тип поля "Boolean" разедела ГД добавлена возможность указать значение по умолчанию и выбрать дизайн внешнего вида (Флажок, Выпадающий список, Радио кнопки)
 * [feature] Добавлен $host параметр в класс Request
 * [feature] По умолчанию виджет "Список страниц" теперь не подгружает профиль пользователя, для подгрузки модели пользователя необходимо включить опцию в настройках виджета.
 * [feature] В модели страницы Model_Page_Front удалены join для получения имени пользователя, методы author и updator теперь возвращают модель Model_User.
 * [feature] Добавлен класс Callback
 * [feature] Добавлен метод `convert_to_jpeg` в класс Image
 * [feature] Добавлена возможность передавать в валидацию документа Datasource свой объект валидации
 * [fix] Исправлен дизайн elFinder
 * [fix] Поправлены SQL схемы для инсталлятора
 * [fix] Исправлена проблема с очисткой расширения в slug в настройках страницы
 * [fix] Добавлено удаление таблиц из БД при отключении плагина Гибридные данные
 * [fix] Отображение в списке патчей только файлов с расширением php
 * [fix] Исправлена ошибка с удалением документов из таблицы
 * [fix] Исправлен доступ к публичным методам API для неавторизованных пользователей
 * [fix] Исправлена проблема с сорировкой страниц вложенностью > 5
 * [fix] Исправлена ошибка с прокруткой страницы в начало при нажатии на кнопки меню редактора RedactorJS

### 10.58.3
 * [feature] Добавлен просмотр списка репозиториев плагинов в Github
 * [feature] Указание в профиле пользователя языка по умолчанию
 * [refactoring] Plugins module
 * [refactoring] Filter class
 * [refactoring] Hybrid creator widget
 * [fix] Fix hotkeys bug
 * [fix] Исправление ошибок

### 10.53.104
 * [feature] Добавлен модуль Captcha
 * [feature] Создание профиля пользователя из ГД раздела
 * [feature] В класс `DataSource_Hybrid_Field` добавлен метод `booleans`
 * [feature] В метод `Image::cache` добавлен кроп
 * [feature] Добавлена возможность создавать глобальные JS события в модулях и плагинах создав файл media/js/events.js Содержимое файла кешируется на 1 день, при внесении изенений необходимо сбрасывать кеш
 * [feature] Переработан класс для работы с пакетами CSS и JS. Из контроллера Backend все скрипты вынесены в пакеты для возможности загрузки пакетов в Frontend. В класс Meta добавлен метод для подключения пакетов
 * [feature] Переработан скрипт добавления счетчика к пункту меню
 * [feature] Доработан AJAX прелоадер, добавлена возможность показывать его не только на всю страницу, но и в отдельном блоке
 * [feature] Контроллер Update вынесен в отдельный модуль `update`, добавлен пункт в меню и просмотр измений относительно репозитория Github
 * [feature] Доработан плагин RedactorJS, вместо стандартных иконок теперь используется Font-awesome, поправлен CSS, убраны градиенты и скругления, кнопки во всплывающих окнах заменены на стандартные bootstrap
 * [feature] В настройки раздела ГД добавлена возможность указывать MySQL индекс для полей
 * [feature] В API класс добавлены setter и getter для добавления папаметров в json
 * [feature] В класс Meta добавлены методы `icon` и `package`
 * [feature] AJAX проверка настроек БД в инсталляторе
 * [feature] Замена `Route::url` нв `Route::get(..)->uri`
 * [feature] Добавлен метод проверки в API контроллере `is_backend()`
 * [feature] Поправлен контроллер API_Media, добавлена возможность указать модуль к которому относится картинка при загрузке и вывести данные относящиеся к определенному модулю
 * [feature] В роут API модуля добавлен необязательный параметр backend
 * [feature] Рефакторинг виджетов ГД
 * [feature] Добавлена проверка Security token в документы ГД, в основном необходимо при использовании формы в Frontend
 * [feature] Доработан виджет Hybrid_Creator (AJAX ответ при успешной операции, при передачи ID документа - обновление существующей записи)
 * [feature] Доработка класс Sitemap, реализация RecursiveIterator, также для перебора многомерных мыссивов может использоваться в паре с RecursiveIteratorIterator
 * [issue #256] https://github.com/butschster/kodicms/issues/258
 * [issue #256] https://github.com/butschster/kodicms/issues/256
 * [fix] Исправление сохранение данных через elFinder
 * [fix] Исправлено удаление полей ГД раздела
 * [fix] Исправлены поля Array и Document в разделе ГД
 * [fix] Исправлена ошибка добавления ролей пользователю
 * [fix] Исправлен класс типа страницы "Гибридные документы"
 * [fix] При помещении виджета в блоки PRE и POST происходил вывод шаблона
 * [fix] При отсутсвии класса виджета, раздела или ГД поля сайт переставал работать
 * [fix] Исправление ошибок

### 10.25.50
 * [feature] Добавлена сортировка списка ГД в произвольном порядке
 * [feature] Новый виджет "Редактор ГД документа"
 * [feature] Добавлена подсветка в списке блоков шаблона, а также обновление списка блоков через AJAX на страницах установки виджетов.
 * [feature] Исправлено поведение полей ГД документа показывающие Exception при отсутсвии класса для данного типа поля, теперь поле просто иссчезает из списка
 * [feature] Новый виджет "Обработчик создания ГД документа"
 * [feature] Переработан модуль Reflinks
 * [feature] Новый виджет "Вспомнить пароль"
 * [feature] Новый виджет "Профиль пользователя"
 * [feature] Добавлена возможность к полю типа "String" подключать файловый менеджер
 * [feature] В названии блоков добавлена возможность использовать символы "." , "-" и "_"
 * [feature] На странице просмотра логов добавлена возможность указывать кол-во элементов выводимое на одной странице
 * [feature] Панель поиска на странице виджетов
 * [feature] Новый класс Sitemap для преобразования массивов в дерево
 * [feature] Загрузка изображений через RedactorJS и выбор загруженных из таблицы в БД `media`
 * [feature] Добавлено отображение превью для прикрепляемых картинок поля Images
 * [feature] Добавлен доп. функционал для получения параметров страницы и статических классов из CTX.
 * [feature] Добавлены горячие клавиши
 * [feature] Переработан механизм выделения строк с помощью checkbox
 * [feature] Добавлены глобальтные горячие клавишы для сброса кеша (shift+f1), обновления списка блоков (shift+f4), обновления поискового индекса (shift+f3)
 * [update] Обновление библиотеки jQuery Steps до версии 1.0.7
 * [update] Обновление библиотеки DateTimePicker до версии 2.2.9
 * [update] Обновление библиотеки jQuery до версии 2.1.1
 * [update] Обновление библиотеки Dropzone до версии 3.10.2
 * [update] Обновление библиотеки Select2 до версии 3.5.0
 * [fix] Исправлена ошибка с кешированием виджетов
 * [fix] Исправлена генерация URL в виджете поиска раздела ГД
 * [fix] Исправлен механизм добавления нового пользователя
 * [fix] Исправлен тект валидации email адреса при создании пользователя
 * [fix] Исправлена ошибка валидации при создании раздела ГД
 * [fix] Исправлен хост по умолчанию для дорайвера кеша mongodb
 * [fix] Добавлен перевод текста на странице "Информация"
 * [issue #193] Добавлена возможность для виджета подключить дополнительно CSS и JS файлы через его настройки.
 * [issue #251] https://github.com/butschster/kodicms/issues/251
 * [issue #253] https://github.com/butschster/kodicms/issues/253
 * [fix] Добавлен недостающий перевод
 * [fix] Добавлен phpDoc
 * [fix] Исправлена работа плагина Redirect
 * [fix] Исправлены ошибки в ГД поле Tags
 * [fix] Исправленf ошибка с указанием значения по умолчанию для ГД поля Float
 * [fix] Исправлено множество мелких ошибок

### 10.00.00
 * [feature] Добавлен плагин Гибридные данные
 * [feature] Добавлена поддержка MySQLi и PDO драйвера для работы с БД
 * [feature] Добавлен модуль "Задачи", для запуска скриптов по расписанию
 * [feature] Добавлена таблица media и модель media для загрузки файлов
 * [feature] Добавлен модуль просмотра системных логов
 * [feature] Добавлен модуль Sidebar для быстрой генерации форм поиска
 * [feature] Доработан класс Assets, добавлена возможность слияния css и js, а также создания пакетов со скриптами
 * [feature] Гибкое управление meta полями в настройках страницы
 * [feature] Добавлена индексация и поиск по страницам и разделу Datasource
 * [feature] Добавлено кеширование раздела Userguide, поправлен дизайн.
 * [feature] Замена центра уведомлений jGrowl на pNotify (http://sciactive.com/pnotify/)
 * [feature] Использование jQuery плагина select2 для организации тегов
 * [feature] Добавлен метод `Image::cache` для изменения размера изображения на лету
 * [update] Обновление Kohana до версии `3.3.2 dryocopus`
 * [update] Немного упрощен дизайн, стал более строже
 * [update] Улучшена работа с виджетами, добавлена возможность показывать виджеты пользователям с определенными ролями
 * [update] Исправлены права доступа к разделам
 * [update] Вынос раздела "Страницы" в отдельный модуль и перевод на ORM
 * [update] Доработан класс ORM, в нем появидись методы запускаемые до и после создания, обновления, удаления записей
 * [update] Обновление сторонних библиотек до последней версии
 * [update] Все файлы относящиеся к Демо сайту переехали в соответсвующий плагин
 * [fix] Исправлены ошибки связанные с файловым менеджером elFinder (Ресайз, кроп)
 * [fix] Исправлено множество ошибок
 * [fix] Добавлены недостающие переводы

### 9.15.46
 * [feature] Переделан механизм уравления почтовыми сообщениями и событиями, за это теперь отвечает отдельный раздел
 * [feature] Backend теперь поддерживает многоуровневое меню
 * [feature] API теперь работает по ключам доступа, либо под авторизованным пользователем
 * [feature] Виджет Sendmail (Отправка почты) работает через модуль почтовых уведомлений
 * [feature] Переработан инсталлятор системы (https://github.com/butschster/kodicms/commit/5fe562fdf110d5d3435429dea4dcdc907eb3771d)
 * [update] Доработан модуль Плагины, при установке плагина он сразу активируется, а не после перезагрузки
 * [update] В настройки сайта добавлена опция "Язык по умолчаию"
 * [fix] При сменен названия точки входа в админку не работали некоторые ссылки
 * [fix] При вставки через `cms.filter.exec` в RedactorJS текста, он вставлялся в виде ссылки
 * [fix] Параметр `Kohana::$caching` не влияет на модуль `Cache` и соответсвенно кеш идущий через него не отключался
 * [feature] Виджет авторизации может работать через AJAX
 * [feature] Виджет Меню теперь по умолчанию не показывает скрытые страницы, меняется в настройках виджета
 * [fix] Исправлена видимость пунктов меню Архива для прав доступа
 * [feature] Класс Meta теперь работает через Context, в виде Context::instance()->meta()->...
 * [fix] Исправлена массовая рассылка почты с интервалами
 * [feature] Email_Type теперь может через метод `add_to_queue` добавлять почтовые сообщения в список на рассылку
 * [update] Добавлена смена языка в инсталляторе
 * [update] Демо сайт вынесен в отдельный модуль, демо контент устанавливается только при включеной опции в инсталляторе, либо по активации плагина test
 * [update] Доработан функционал виджетов. В один блок можно помещать несколько виджетов. Доработана страница расположения виджетов.
 * [feature] Snippets и layouts теперь можно размещать в плагине или модуле. При выборе сниппета или шаблона поиск сначала происходт в корне, потом в модуляих и затем в плагинах.
 * [feature] Добавлена пустышка раздела Datasource, раздел "гибридные данные" для него будет поставляться в виде плагина.
 * [update] Доработан модуль "Хлебные крошки"
 * [feature] Теги вынесены в отдельный модуль
 * [feature] Части страниц вынесены в отдельный модуль и могут быть отключены
 * [feature] Дополнительные поля страницы вынесены в плагин
 * [feature] Доработан инсталлятор системы в части установки схемы БД и дампа данных. Теперь каждый модуль и плагин имеет в папке `install` информацию о своих таблицах. Также в момент установки происходит запуска файла install.php в каждом модуле.
 * [feature] Добавлен новый статус для страницы "Защищена паролем" и соответсвующий виджет и тип страницы
 * [feature] Добавлена в тестовом режиме страница миграции БД старых версий KodiCMS на новую `/backend/update` в ней можно увидеть различия в схебе БД
 * [fix] А также многочисленные другие испралвения, улучшения и т.д.

### 8.2.14
 * [feature] Добавлен класс Database_logs и возможность логировать действия в БД
 * [feature] Добавлен профиль пользователя
 * [feature] Добавлена страница информации о системе
 * [refactoring] Переработанны все системные сообщения KodiCMS и их логирование, теперь в профиле пользователя можно смотреть его действия
 * [feature] Добавлен класс Filter для фильтрации массивов и манипуляций над его значениями, как в старых версиях ORM
 * [update] Класс Validation теперь может работать с многомерными массивами (Испульзуется `Arr::path`)
 * [refactoring] Переработан раздел настроек, теперь можно производить валидацию и фильтрацию данных (http://kodicms.ru/forum.html#/discussion/91/kastomnye-nastroyki-na-stranice-nastroek)
 * [refactoring] Настройки Email перенеслись в системные настройки
 * [feature] В настройках системы и многих других разделах (Пользователи, Роли) появились вкладки, работает через JS
 * [update] Добавлено кеширование API документации, поправлен CSS, структурированы файлы
 * [refactoring] Старый класс Filter переименован в WYSIWYG
 * [refactoring] Произведен рефакторинг плагина Disqus, теперь вывод блока комментариев производится через виджет
 * [fix] Исправлен виджет "Облако тегов", при отсутсвии тегов появлялась ошибка
 * [refactoring] Переработана задача рассылки почты, очистка логов рассылки вынесена в отдельную задачу
 * [feature] Добавлен драйвер кеширования APC с тегами.
 * [refactoring] Переработан счетчик событий для пуктов меню, теперь им можно управлять через JS
 * [fix] Исправлены ошибки в плагине Backup
 * [refactoring] Доработан плагин "Сообщения"
 * [fix] Раньше плагин jQuery Tags применялся ко всем элементам, с классом `tags`, теперь только к полям ввода.


### 7.10.40
 * [feature] Замена класса Setting на Config_Database, в связи с этим замена таблицы Setting на Config
 * [feature] Добавлен раздел с настройкой модуля Email
 * [update] Обновление плагина Сообщения
 * [refactoring] Доработан класс Api_Response
 * [fix] Исправлено отображения коунтрера в навигации
 * [fix] Исправление мелких ошибок

### 6.8.27

 * [feature] Кнопка обновления кеша в настройках теперь сбрасывает кеш через ajax
 * [fix] Исправлены ошибки в плагине Archive
 * [feature] В страницах поле Robots (issue #186)
 * [feature] Адаптация меню админ панели под ширину экрана
 * [fix] Минимальная ширина админ панели - 860px
 * [feature] Добавлена подстветка SQL кода в плагине Backup
 * [fix] Дизайн файлового менеджера максимально приближен к дизайну админ панели
 * [fix] Обновлен redactor js до последней доступной версии на github
 * [fix] Файловый менеджер для редактора вынесен в качестве плагина в модуль elfinder
 * [feature] Добавлен плагин типографа http://mdash.ru/ , доступен в redactor.js
 * [feature] Добавлен плагин в redactor.js для открытия во весь экран
 * [fix] Исправлена ошибка с открытием редактора Ace во весь экран
 * [feature] Замена jquery.uploader на jquery.dropzone (http://www.dropzonejs.com/)
 * [fix] Исправление плагина Backup
 * [fix] Исправление мелких ошибок

### 6.4.21

 * [bug] При работе с Context из backend в нем не работал Request
 * [bug] Исправлен механизм установки виджетов для всех страниц (issue #181)
 * [bug] Исправлена ошибка с добавлением query string
 * [feature] Run block after page load (issue #184)
 * [feature] Метод Model_Page_Front::children() теперь всегда выводит массив
 * [feature] Класс Meta для вставки в шаблон сайта meta информации, js и css.
 * [bug] Исправлена проблема с сохранением настроек после установки системы.
 * [feature] Фильтрация страниц по тегам (через ?tag=...)
 * [feature] Виджет "Облако тегов"
 * [fix] Добавлен перевод множества непереведенных терминов
 * [fix] Исправлена ошибка из за которой не работал resize в Файловом менеджере
 * [feature] Произведен рефакторинг класса Model_Widget_Decorator
 * [feature] Настройки для виджета наследуемого от Model_Widget_Decorator_Pagination подставляются в шаблон админики автоматически.
 * [fix] Исправлен внешний вид диалогового окна ресайза изображений в файловом менеджере

### 6.0.0

 * Добавлен раздел "Роли"
 * Добавлены права доступа к разделам
 * В редакторе страниц добавлено поле "Meta title"
 * Исправлены ошибки в файловом менеджере (удаление файлов и т.д.)
 * Настройки языка интерфейса перенесены в профиль пользователя
 * Добавлены новые виджеты
 * Обновление Kohana до версии 3.3.1
 * Обновление до послдених версий сторонних библиотек
 * Другие улучшения ядра


### 5.14.0

* Переделана сортировка страниц
* Переделан модуль Plugins
* Редактор шаблонов и сниппетов рястягивается на высоту экрана
* Ace обзавелся двумя комбинациями клавиш: CTRL+F - на весь экран, CTRL+S - сохранение
* В плагин Yandex Metrika добавлены дополнительные настройки
* Переделаны настройки плагина Less compiler
* В настройках сайта добавлено поле "Описание сайта" и заменен ключ "Заголовок сайта" на `site_title`
* Другие улучшения ядра

### 5.5.0

* Удален из поставки плагин CodeMirror (Теперь для подсветки используется Ace)
* Доработан JS API добавления фильтров(редакторов) в систему
* Изменен роут для доступа к системному API 
* JS файлового менеджера elfiner вынесен в папку модуля