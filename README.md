<h1 align=center>HTTP Authentication </h1>

<h2>Цель: спроектировать и разработать ситему аутентификации пользователей на протоколе HTTP </h2>

<h2 align=center>1. Пользовательский интерфейс</h2>

1. Форма авторизации (login.php):
<img src=images/signin.png height=40% width=40%>
2. Форма регистрации (register.php):
<br>
<img src=images/signup.png height=40% width=40%>
3. intropage.php:
<br>
<img src=images/intro.png height=40% width=40%>
4. Форма смены пароля (changepassword.php):
<br>
<img src=images/changepassword.png height=40% width=40%>

<h2 align=center>2. Пользовательские сценарии работы</h2>

Сценарий работы пользователя представлен в виде блок-схемы:<br><br>
<img src=images/uws.png height=60% width=60%>

<h2 align=center>3. Структура БД</h2>

Используется MySQL. Описание БД:<br><br>
<img src=images/db.png height=60% width=60%>

<h2 align=center>4. Описание алгоритмов</h2>

1. Авторизация:
<img src=images/alglogin.png height=40% width=40%>
Так же имеет место быть проверка на не пустоту предоставленных пользователем данных, что не указано в блок-схеме.<br>
2. Регистрация:
<img src=images/algreg.png height=40% width=40%>
3. Выход: происходит разрушение сессии пользователя и переход на страницу авторизации.<br>
4. Смена пароля:
<img src=images/chp.png height=40% width=40%>
