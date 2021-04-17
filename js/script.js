"use strict"

let searchInputs = document.querySelectorAll('.input_entry');

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