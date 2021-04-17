"use strict"

// Поля для поиска
const searchInputs = document.querySelectorAll('.input_entry');

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
const addButtons = document.querySelectorAll('.button_action_add');

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

// Форма добавления записи в БД
const addForm = document.querySelector('.form_action_add-row');

// Если форма есть на странице - навешиваем обработчик и валидацию
if (addForm) {
    addForm.addEventListener('submit', (e) => {
        e.preventDefault();

        if (validateForm(addForm)) {
            addForm.submit();
        }
    });
}

// Валидация некоторых полей
function validateForm(form) {
    const inputs = form.querySelectorAll('.input');
    for (let input of inputs) {
        if (input.classList.contains('input_validate_tel')) {
            let regExp = new RegExp(/^\+7[0-9]{10}$/);
            if (!regExp.test(input.value)) {
                alert("Неправильно задан номер!");
                return false;
            }
        }
        if (input.classList.contains('input_validate_posnum')) {
            if (+input.value < 0) {
                alert("Дисциплин не может быть отрицательное число!");
                return false;
            }
        }
        if (input.classList.contains('input_validate_char')) {
            let regExp = new RegExp(/^[A-ZА-Я]{1}$/);
            if (!regExp.test(input.value)) {
                alert("Корпус задается одной заглавной буквой!");
                return false;
            }
        }
    }

    return false;
}
