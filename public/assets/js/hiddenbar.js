const addButton = document.getElementById('add-skill-btn');
const inputContainer = document.getElementById('skill-input-container');
const createSkillButton = document.getElementById('create-skill-btn');

// Событие для показа поля ввода
addButton.addEventListener('click', () => {
    inputContainer.classList.toggle('hidden');
});

// Событие для обработки создания навыка
createSkillButton.addEventListener('click', () => {
    const skillName = document.getElementById('skill-name').value;
    if (skillName) {
        alert(`Навык "${skillName}" успешно создан!`);
        // Здесь вы можете добавить код для отправки данных на сервер
        document.getElementById('skill-name').value = ''; // Очистка поля
        inputContainer.classList.add('hidden'); // Скрыть поле ввода после создания
    } else {
        alert('Пожалуйста, введите название навыка.');
    }
});
