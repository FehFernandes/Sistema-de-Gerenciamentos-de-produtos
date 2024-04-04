var menuItems = ['fornecedor', 'notinha', 'estoque', 'produto'];

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


// JavaScript puro
document.querySelector('.vendas').addEventListener('click', function() {
    var submenu = document.querySelector('.itensVendas');
    if (submenu.style.display === 'none') {
        submenu.style.display = 'block';
    } else {
        submenu.style.display = 'none';
    }
});

// jQuery
$(document).ready(function(){
    $(".vendas").click(function(){
        if ($(".itensVendas").is(":visible")) {
            $(".itensVendas").slideUp("slow");
        } else {
            $(".itensVendas").slideDown("slow");
        }
    });
});

