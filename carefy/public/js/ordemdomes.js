var button = document.querySelectorAll('.ordenar-mes');
button.forEach(function (btn) {
    btn.addEventListener('click', function () {
        var article = btn.closest('.container');
        var employees = Array.from(article.querySelectorAll('.aniversariante-container'));

    employees.sort(function(a, b) {
        var mesA = new Date(getDateFromText(a.querySelector('.aniversariante-info span').textContent));
        var mesB = new Date(getDateFromText(b.querySelector('.aniversariante-info span').textContent));
        return mesA - mesB;
    });

    employees.forEach(function(employee) {
        article.removeChild(employee);
    });

    employees.forEach(function(employee) {
        article.appendChild(employee);
    });
});
})

function getDateFromText(text) {
    var regex = /(\d+)\s+de\s+(\w+)/;
    var matches = text.match(regex);
    if (matches && matches.length === 3) {
        var day = parseInt(matches[1]);
        var monthName = matches[2];
        var month = {
            'janeiro': 0, 'fevereiro': 1, 'março': 2, 'abril': 3, 'maio': 4, 'junho': 5,
            'julho': 6, 'agosto': 7, 'setembro': 8, 'outubro': 9, 'novembro': 10, 'dezembro': 11
        }[monthName.toLowerCase()];
        return new Date(new Date().getFullYear(), month, day);
    }
    return null;
}