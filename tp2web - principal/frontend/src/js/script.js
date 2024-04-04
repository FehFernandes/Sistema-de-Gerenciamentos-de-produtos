var menuItems = ['fornecedor', 'notinha', 'estoque', 'produto', 'vendas', 'vendasDiarias'];

menuItems.forEach(function(item) {
    $('.' + item).click(function() {
        $('.menuLateral ul .itens' + item.charAt(0).toUpperCase() + item.slice(1)).toggleClass('mostra');
    });

    $('.' + item).mouseover(function() {
        $('.menuLateral ul .seta' + item.charAt(0).toUpperCase() + item.slice(1)).toggleClass('gira');
    });

    $('.' + item).mouseout(function() {
        $('.menuLateral ul .seta' + item.charAt(0).toUpperCase() + item.slice(1)).toggleClass('gira');
    });
});
