// $(function() {
//     $.ajax({
//         dataType: "json",
//         url: 'https://jsonplaceholder.typicode.com/posts',
//         success: function(response) {
//             console.log(response)
//         }
//     });
//     var lista = [
//         { descricao: 'Veiculo 1', placa: 'adwadw', marca: 'dawdwa' },
//         { descricao: 'Veiculo 2', placa: 'adwadw', marca: 'dawdwa' },
//         { descricao: 'Veiculo 3', placa: 'adwadw', marca: 'dawdwa' }
//     ]
//     $.each(lista, function(i, veiculo) {
//         $('#lista_veiculos tbody').append(
//             $('<tr>').append(
//                 $('<td>', { text: veiculo['descricao'] }),
//                 $('<td>', { text: veiculo['placa'] }),
//                 $('<td>', { text: veiculo['marca'] })
//             )
//         )
//     })
// });