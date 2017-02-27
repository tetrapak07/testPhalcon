# Auth and CRUD for users (based on Phalcon Framework)
[![Code Climate](https://lima.codeclimate.com/repos/58b4ad3da26906029100000b/badges/c6719e9df9b0e0e676ff/gpa.svg)](https://lima.codeclimate.com/repos/58b4ad3da26906029100000b/feed)

Задача: Создать Авторизацию и CRUD для пользователей

База Данных:

Стандартная система пользователей и групп:

users
groups
users_groups

Форма авторизации:

Вход
Регистрация
Забыли пароль (желательно, не обязательно)

Вход через Facebook  (желательно, не обязательно)
Вход через Google (желательно, не обязательно)

CRUD таблица:

Колонки:
id, email, все группы списком (GROUP_CONCAT)

Строка поиска:
Ищет по email и названию группы (LIKE)

Пагинация (По 5 на странице)

Функция удаления

Формы ADD / EDIT:

Email
Password (в базе храниться в зашифрованном виде)
Группы (MultiSelect)
