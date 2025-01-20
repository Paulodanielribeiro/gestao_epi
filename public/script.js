function gerarRelatorio() {
    fetch('../api/gerar_relatorio.php')
        .then(response => {
            if (response.ok) {
                return response.blob(); // Caso seja para download
            } else {
                throw new Error("Erro ao gerar relatório");
            }
        })
        .then(blob => {
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            a.download = 'relatorio.pdf'; // Nome do arquivo
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
        })
        .catch(error => console.error(error.message));
}
