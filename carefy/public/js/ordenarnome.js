var button = document.querySelectorAll('.ordenar-nome');
button.forEach(function (btn) {
    btn.addEventListener('click', function () {
        var article = btn.closest('.container');
        var employees = Array.from(article.querySelectorAll('.aniversariante-container'));

        employees.sort(function(a, b) {
            var nomeA = a.querySelector('.aniversariante-info p').textContent.toLowerCase();
            var nomeB = b.querySelector('.aniversariante-info p').textContent.toLowerCase();
            return nomeA.localeCompare(nomeB);
        });

        employees.forEach(function(employee) {
            article.removeChild(employee);
        });

        employees.forEach(function(employee) {
            article.appendChild(employee);
        });
    })
})