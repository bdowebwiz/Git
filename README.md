Тестовая задача для разработчика на Yii2

Создать модуль выборки блюд по заданным пользователем ингредиентам.

1. Yii2 advanced template.

2. MySQL / sqlite.

3. Время выполнения 3-7 дней.

Административная часть:

1. CRUD (Create, Read, Update, Delete) ингредиентов.

2. CRUD (Create, Read, Update, Delete) формирования блюд из этих ингредиентов.

Администратор может скрыть один из ингредиентов, в этом случае блюдо содержащее этот ингредиент тоже должно быть скрыто.

Пользовательская часть:

Пользователь может выбрать до 5-ти ингредиентов для приготовления блюда, при этом:

1. Если найдены блюда с полным совпадением ингредиентов - вывести только их.

2. Если найдены блюда с частичным совпадением ингредиентов - вывести в порядке уменьшения совпадения ингредиентов вплоть до 2-х.

3. Если найдены блюда с совпадением менее чем 2 ингредиента или не найдены вовсе - вывести “Ничего не найдено”.

4. Если выбрано менее 2-х ингредиентов - не производить поиск, выдать сообщение: “Выберите больше ингредиентов”.

Выполненное задание необходимо выложить на гитхаб.
