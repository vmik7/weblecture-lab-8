"use strict"

// Поля для поиска
let searchInputs = document.querySelectorAll('.input_entry');

// Навешиваем отправку формы по нажатию Enter на любое поле
for (let input of searchInputs) {
    input.addEventListener('keydown', (e) => {
        if (e.key == 'Enter') {
            let form = document.createElement('form');
            form.action = 'index.php';
            form.method = 'GET';

            form.innerHTML = '';
            for (let cur of searchInputs) {
                form.innerHTML += `<input name="${ cur.getAttribute('name') }" value="${ cur.value }">`;
            }

            document.body.append(form);
            form.submit();
        }
    });
}

// Кнопки добавления записей в таблицы
let addButtons = document.querySelectorAll('.button_action_add');

// Навешиваем отправку формы по нажатию
for (let btn of addButtons) {
    btn.addEventListener('click', () => {
        let form = document.createElement('form');
            form.action = 'add.php';
            form.method = 'GET';

            form.innerHTML = `<input name="table" value="${ btn.dataset.table }">`;

            document.body.append(form);
            form.submit();
    });
}
