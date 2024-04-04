function mascaraData(input) {
   var valor = input.value;
   
   // Verifica se o último caractere inserido é um número
   if(isNaN(valor[valor.length-1])){
      // Se não for um número, remove o último caractere
      input.value = valor.substring(0, valor.length-1);
      return;
   }
   
   // Define o tamanho máximo do input como 10
   input.setAttribute("maxlength", "10");
   
   // Adiciona uma barra após o segundo e quinto caracteres
   if (valor.length == 2 || valor.length == 5) {
       input.value += "/";
   }
}
