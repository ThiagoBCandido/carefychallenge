<?php

require_once __DIR__ . '/../controlador/anivercontroll.php';
require_once __DIR__ . '/../util/formatardatas.php';
require_once __DIR__ . '/../util/formatardatacomanos.php';
require_once __DIR__ . '/../util/calcularanos.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <title>projeto carefy</title>
</head>

<body>
    <main>
        <article class="container">
            <header>
                <h2>"Nivers" dos funcionários!</h2>
                <span>dia do "niver" e idade</span>
                <div class="botoes">
                    <button class="ordenar-nome">Ordenar nome</button>
                    <button class="ordenar-mes">Ordenar mês</button>
                </div>
            </header>
            <?php foreach ($employees as $employee) : ?>
                <?php if ($employee['data_de_saida'] === null) : ?>
                    <section class="aniversariante-container">
                        <section class="aniversariante-info">
                            <p><?php echo htmlspecialchars($employee['nome']); ?></p>
                            <span><?php echo formatarData($employee['data_de_nascimento']); ?></span>
                        </section>
                        <span class="data-de-nascimento"><?php echo calcularAnos($employee['data_de_nascimento']); ?></span>
                    </section>
                <?php endif; ?>
            <?php endforeach; ?>
        </article>

        <article class="container">
            <header>
                <h2>Aniversários de "casa"!</h2>
                <span>Data que começou na empresa e seus anos de "casa"</span>
                <div class="botoes">
                    <button class="ordenar-nome">Ordenar nome</button>
                    <button class="ordenar-mes">Ordenar mês</button>
                </div>
            </header>
            <?php foreach ($employees as $employee) : ?>
                <?php if ($employee['data_de_saida'] === null) : ?>
                    <section class="aniversariante-container">
                        <section class="aniversariante-info">
                            <p><?php echo htmlspecialchars($employee['nome']); ?></p>
                            <span><?php echo formatarDataComAno($employee['data_de_entrada']); ?></span>
                        </section>
                        <span class="data-de-nascimento"><?php echo calcularAnos($employee['data_de_entrada']); ?></span>
                    </section>
                <?php endif; ?>
            <?php endforeach; ?>
        </article>

        <article class="container">
            <header>
                <h2>"Niver" do dia!</h2>
                <span>Idade e data de nascimento</span>
            </header>
            <?php
            $currentDate = date('d/m');
            $aniversarianteEncontrado = false;
            foreach ($employees as $employee) :
                if ($employee['data_de_saida'] === null) :
                $dataNascimento = DateTime::createFromFormat('d/m/Y', $employee['data_de_nascimento']);
                $dataNascimentoFormatada = $dataNascimento->format('d/m');
                if ($dataNascimentoFormatada === $currentDate) :
                    $aniversarianteEncontrado = true;
            ?>
                    <section class="aniversariante-container">
                        <section class="aniversariante-info">
                            <p><?php echo htmlspecialchars($employee['nome']); ?></p>
                            <span>Completando <?php echo calcularAnos($employee['data_de_nascimento']); ?></span>
                        </section>
                        <span class="data-de-nascimento"><?php echo htmlspecialchars($employee['data_de_nascimento']); ?></span>
                    </section>
                <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php if (!$aniversarianteEncontrado) : ?>
                <p class="sem-aniversariante">Sem aniversário!</p>
            <?php endif; ?>
        </article>

        <article class="container">
            <header>
                <h2>"Niver" do dia!</h2>
                <span>Anos de casa e data que iniciou na empresa</span>
            </header>
            <?php
            $currentDate = date('d/m');
            $aniversarianteEncontrado = false;
            foreach ($employees as $employee) :
                $dataEntrada = DateTime::createFromFormat('d/m/Y', $employee['data_de_entrada']);
                $dataEntradaFormatada = $dataEntrada->format('d/m');
                if ($dataEntradaFormatada === $currentDate) :
                    if ($employee['data_de_saida'] === null) :
                    $aniversarianteEncontrado = true;
            ?>
                    <section class="aniversariante-container">
                        <section class="aniversariante-info">
                            <p><?php echo htmlspecialchars($employee['nome']); ?></p>
                            <span>Completando <?php echo calcularAnos($employee['data_de_entrada']); ?> de carefy</span>
                        </section>
                        <span class="data-de-nascimento"><?php echo htmlspecialchars($employee['data_de_entrada']); ?></span>
                    </section>
                <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php if (!$aniversarianteEncontrado) : ?>
                <p class="sem-aniversariante">Ninguém fez aniversário de casa!</p>
            <?php endif; ?>
        </article>
    </main>
    <script src="../js/ordenarnome.js"></script>
    <script src="../js/ordemdomes.js"></script>
</body>

</html>