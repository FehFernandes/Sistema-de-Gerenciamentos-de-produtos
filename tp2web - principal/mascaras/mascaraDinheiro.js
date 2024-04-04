function mascaraDinheiro(value) {
    // Verifica se o valor é um número
    if (typeof value !== 'number') {
        console.error('O valor fornecido não é um número.');
        return;
    }

    // Formata o número como uma string de dinheiro
    return 'R$ ' + value.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
}
