
    // Обработчик для выбора аватарок
    document.querySelectorAll('.avatar').forEach(item => {
    item.addEventListener('click', function() {
        // Снимаем выделение с остальных
        document.querySelectorAll('.avatar').forEach(avatar => avatar.classList.remove('selected'));
        // Выделяем выбранную
        this.classList.add('selected');
        // Ставим соответствующую радиокнопку в "выбранное"
        this.previousElementSibling.checked = true;
    });
});
