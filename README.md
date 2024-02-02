Для развертывания приложения потребуется :
Установить : 
	- Open Server Panel ver.5.4.3
После запуска выбрать модули :
	- HTTP Apache 2.4 - PHP 8.0 - 8.1
	- PHP ver. 8.1.9- Zend Engine v4.1.9
	- mysql Ver 8.0.30 for Win64 on x86_64
Скопировать папку "forum"  в папку "domains", которая находиться в OSPanel
В настройках задать "имя домена", которой соответсвует папка "forum\forumv1\public"
Открыть проект в текстовом редакторе
Зайти в файл ".env" и добавить свои данные для подключения к БД
Запустить консоль Open Server Panel
Перейти в папку с проектом
Выполнить команду :  php artisan migrate
Выполнить команду :  php artisan tinker
Для создания учетной записи Admin ввести команду: \App\Models\User::factory()->create()
Далее открыть браузер и ввести имя домена в адресную строку
Ввести login: admin@admin.ru password: password
