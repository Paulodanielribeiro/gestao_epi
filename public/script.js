// Cadastro de EPI
document.getElementById('epiForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const colaborador = document.getElementById('colaborador').value;
    const epi = document.getElementById('epi').value;
    const quantidade = document.getElementById('quantidade').value;

    fetch('../api/cadastrar_epi.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ colaborador, epi, quantidade })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.status === 'sucesso' ? 'Registrado com sucesso!' : 'Erro ao registrar.');
    });
});

// Gerar Relatório
function gerarRelatorio() {
    window.open('../api/gerar_relatorio.php', '_blank');
}
