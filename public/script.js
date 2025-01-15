function gerarRelatorio() {
    fetch('../api/gerar_relatorio.php')
        .then(response => response.json())
        .then(data => {
            const ctx = document.getElementById('graficoRelatorio').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.map(item => item.nome_epi),
                    datasets: [{
                        label: 'Quantidade Entregue',
                        data: data.map(item => item.total_entregue),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                }
            });
        });
}