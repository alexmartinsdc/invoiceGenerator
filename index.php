<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <title>Gerador de Invoice</title>

  <style>
    body {
      --bs-body-font-family: var(--bs-font-sans-serif);
      --bs-body-line-height: 1.4;
      --bs-body-bg: var(--bs-gray-100);
    }

    .table {
      --bs-table-color: var(--bs-gray-600);
      --bs-table-bg: var(--bs-gray-100);
      --bs-table-border-color: transparent;
    }

    #formulario {
      width: 900px;
      margin: 30px auto;
      position: relative;
    }

    #formulario fieldset {
      background: #FFF;
      border: 0 none;
      border-radius: 5px;
      -moz-border-radius: 5px;
      -webkit-border-radius: 5px;

      box-shadow: 2px 2px 5px 0 rgba(0, 0, 0, 0.2);
      padding: 15px 15px;


      box-sizing: border-box;
      width: 100%;
      position: absolute;
    }

    #formulario fieldset:not(:first-of-type) {
      display: none;
    }

    #formulario #progresso {
      margin-bottom: 30px;
      overflow: hidden;

      counter-reset: step;
    }

    #progresso {
      display: flex;
      justify-content: space-between;
    }

    #formulario #progresso li {
      list-style-type: none;
      font-weight: bold;
      text-transform: uppercase;
      text-align: center;
      width: 33.33%;
      position: relative;
    }

    #formulario #progresso li:before {
      content: counter(step);
      counter-increment: step;
      width: 30px;
      display: block;
      line-height: 30px;
      color: #FFF;
      background-color: #0094C5;
      border-radius: 30px;
      -moz-border-radius: 30px;
      -webkit-border-radius: 30px;
      padding: 1px;

      margin: 0 auto 10px auto;
    }

    #formulario #progresso li:after {
      content: '';
      width: 100%;
      background: #0094C5;
      height: 2px;
      position: absolute;
      top: 15px;
      left: -50%;
      z-index: -1;
    }

    #formulario #progresso li:first-child:after {
      content: none;
    }

    #formulario #progresso li.ativo:before,
    #formulario #progresso li.ativo:after {
      background: #157347;
    }

    .inputTotalDoc {
      border: none;
      outline: none;
    }

    .resp {
      color: red;
      font-style: italic;
    }

    .resp2 {
      color: green;
      font-style: italic;
    }

    label {
      color: #8a8a8a;
    }

    .totalDoc {
    background-color: #e9ecef;
    border-radius: 8px;
    padding: 0.375rem 0.75rem;
  }

  h6 {
    color: #6C757D;
    font-weight: bold;
  }

  .error {
    color: red;
  }

  input {
    text-transform: uppercase;
  }
  </style>

</head>

<body>

  <form id="formulario" class="mb-3" >
    <ul id="progresso">
      <li class="ativo">Vendedor</li>
      <li>Comprador</li>
      <li>Faturamento</li>
    </ul>
    <div class="resp"></div>
    <div class="resp2"></div>
    <fieldset id="fs_vend">
      <h2>Exportador Brasileiro</h2>

      <div class="row g-3">
        <div class="col-md-6">
          <input id="nome_vend" class="form-control" type="text" name="nome_vend" placeholder="Nome / Razão Social *" maxlength="50" required>
        </div>
        <div class="col-md-6">
          <input class="form-control" type="text" name="sobrenome_vend" placeholder="Sobrenome / Nome Fantasia *" maxlength="50" required>
        </div>
      </div>

      <div class="row g-3 py-2">
        <div class="col-md-4">
          <input class="form-control cpf_cnpj" type="text" name="nif_vend" placeholder="NIF (CPF / CNPJ) *" required>
        </div>
        <div class="col-md-4">
          <input class="form-control telefone_custom" type="text" name="telefone_vend" placeholder="Celular *" required>
        </div>
        <div class="col-md-4">
          <input class="form-control" type="email" name="email_vend" placeholder="E-mail *" required>
        </div>
      </div>

      <div class="row g-3 py-2">
        <div class="col-md-6">
          <input class="form-control" type="text" name="logradouro_vend" placeholder="Logradouro *" required maxlength="50">
        </div>
        <div class="col-md-3">
          <input class="form-control" type="text" name="num_vend" placeholder="Número *" maxlength="10" required>
        </div>
        <div class="col-md-3">
          <input class="form-control" type="text" name="comp_vend" placeholder="Complemento" maxlength="10">
        </div>
      </div>

      <div class="row g-3 py-2">
        <div class="col-md-6">
          <input class="form-control" type="text" name="cidade_vend" placeholder="Cidade *" maxlength="20" required>
        </div>
        <div class="col-md-3">
          <input class="form-control" type="text" name="estado_vend" placeholder="Estado *" maxlength="20" required>
        </div>
        <div class="col-md-3">
          <input class="form-control" type="text" name="pais_vend" placeholder="País *" maxlength="20" required>
        </div>
      </div>      

      <div class="col-md-4 col-md-offset-2">
        <input type="button" name="next" class="next acao col-md-4 btn btn-primary" value="Próximo">
      </div>
    </fieldset>

    <fieldset id="fs_comp">
      <h2>Importador Estrangeiro</h2>

      <div class="row g-3">
        <div class="col-md-6">
          <input class="form-control" type="text" name="nome_comp" placeholder="Nome / Razão Social *" maxlength="50" required>
        </div>
        <div class="col-md-6">
          <input class="form-control" type="text" name="sobrenome_comp" placeholder="Sobrenome / Nome Fantasia *" maxlength="50" required>
        </div>
      </div>

      <div class="row g-3 py-2">
        <div class="col-md-4">
          <input class="form-control cpf_cnpj" type="text" name="nif_comp" placeholder="NIF (CPF / CNPJ)">
        </div>
        <div class="col-md-4">
          <input class="form-control telefone_custom" type="text" name="telefone_comp" placeholder="Celular">
        </div>
        <div class="col-md-4">
          <input class="form-control" type="email" name="email_comp" placeholder="E-mail">
        </div>
      </div>

      <div class="row g-3 py-2">
        <div class="col-md-6">
          <input class="form-control" type="text" name="logradouro_comp" placeholder="Logradouro *" maxlength="20" required>
        </div>
        <div class="col-md-3">
          <input class="form-control" type="text" name="num_comp" placeholder="Número *" maxlength="10" required>
        </div>
        <div class="col-md-3">
          <input class="form-control" type="text" name="comp_comp" placeholder="Complemento" maxlength="10">
        </div>
      </div>

      <div class="row g-3 py-2">
        <div class="col-md-6">
          <input class="form-control" type="text" name="cidade_comp" placeholder="Cidade *" maxlength="20" required>
        </div>
        <div class="col-md-3">
          <input class="form-control" type="text" name="estado_comp" placeholder="Estado *" maxlength="20" required>
        </div>
        <div class="col-md-3">
          <input class="form-control" type="text" name="pais_comp" placeholder="País *" maxlength="20" required>
        </div>
        <div class="col-md-4 col-md-offset-2">
          <input type="button" name="prev" class="prev acao col-md-4 btn btn-primary" value="Anterior">
          <input type="button" name="next" class="next acao col-md-4 btn btn-primary" value="Próximo">
        </div>
      </div>
    </fieldset>

    <fieldset id="fs_fat">
      <h2>Faturamento</h2>

      <div class="row g-3 py-2">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Qtde</th>
              <th scope="col">Unidade</th>
              <th scope="col">Produto/Serviço</th>
              <th scope="col">Moeda</th>
              <th scope="col">Valor</th>
              <th scope="col">Total</th>
              <th></th>
            </tr>
          </thead>
          <tbody class="newRow">
            <tr>
              <td><input name="qtde[]" class="form-control qtde" maxlength="8" required></td>
              <td>
                <select name="unidade[]" class="form-select" required>
                  <option selected></option>
                  <option>G</option>
                  <option>JG</option>
                  <option>LT</option>
                  <option>MWHORA</option>
                  <option>M</option>
                  <option>M2</option>
                  <option>M3</option>
                  <option>1000UN</option>
                  <option>PARES</option>
                  <option>QUILAT</option>
                  <option>KG</option>
                  <option>UN</option>
                </select>
              </td>
              <td><input name="prod_serv[]" class="form-control inputTable" maxlength="20" required></td>
              <td>
                <select name="moeda[]" class="form-select" required>
                  <option selected></option>
                  <option value="USD">USD - Dólar Americano</option>
                  <option value="EUR">EUR - Euro</option>
                  <option value="AUD">AUD - Dólar Australiano</option>
                  <option value="CAD">CAD - Dólar Canadense</option>
                  <option value="CHF">CHF - Franco Suíço</option>
                  <option value="CLP">CLP - Peso Chileno</option>
                  <option value="CNH">CNH - Yuan chinês Offshore</option>
                  <option value="GBP">GBP - Libra Esterlina</option>
                  <option value="JPY">JPY - Iene Japonês</option>
                  <option value="SEK">SEK - Coroa Sueca</option>
                </select>
              </td>
              <td><input name="valor[]" class="valor form-control money2" required></td>
              <td><input name="total_linha[]" class="totalLinha form-control money2" readonly></td>
              <td>
                <button class="btn btn-danger btn-sm" type="button" name="remove-row">-</button>
              </td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="6" style="text-align: left;">
                <button id="new-docs" class="btn btn-warning btn-sm" type="button">+</button>
              </td>
              <td></td>
            </tr>
            <tr>
              <td colspan="7" style="text-align: right;">
                <h5><input name="total_doc" class="totalDoc inputTotalDoc money2" readonly></h5>
              </td>
            </tr>
          </tfoot>
        </table>
      </div>

      <div class="row g-3">
        <div class="d-flex align-items-center col-md-3">
          <h6>Esquema de Pagamento</h6>
        </div>
        <div class="col-md-3">
          <label >Antecipado</label>
          <input type="text" class="form-control percent_custom" id="inputPassword4" name="pag_antecipado" placeholder="%" required>
        </div>
        <div class="col-md-3">
          <label >Produção/Serviço</label>
          <input type="text" class="form-control percent_custom" id="inputPassword4" name="pag_prod" placeholder="%" required>
        </div>
        <div class="col-md-3">
          <label >Desembaraçado/Entregue</label>
          <input type="text" class="form-control percent_custom" id="inputPassword4" name="pag_entregue" placeholder="%" required>
        </div>
      </div>

      <div class="row g-3 pt-3">
        <div class="d-flex align-items-center col-md-4">
          <div> </div>
        </div>        
        <div class="col-md-4">
          <label>Prazo de entrega *</label>
          <input class="form-control" type="date" name="prazo_entrega" required>
        </div>
      </div>

      <div class="col-md-4 py-3 col-md-offset-2">
        <input type="button" name="prev" class="col-md-4 btn btn-primary prev acao" value="Anterior">
        <input type="button" name="finish" class="col-md-4 btn btn-success acao" value="Finalizar">
      </div>
    </fieldset>    

  </form>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  

  <script>

    // Máscara dos campos
    $(document).ready(function(){
      $('.date').mask('00/00/0000');
      $('.phone').mask('0000-0000');
      $('.phone_with_ddd').mask('(00) 0000-0000');
      $('.phone_us').mask('(000) 000-0000');
      $('.mixed').mask('AAA 000-S0S');
      $('.cpf').mask('000.000.000-00', {reverse: true});
      $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
      $('.money').mask('000.000.000.000.000,00', {reverse: true});
      $('.money2').mask("#.##0,00", {reverse: true});
      $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        translation: {
          'Z': {
            pattern: /[0-9]/, optional: true
          }
        }
      });
      $('.ip_address').mask('099.099.099.099');
      $('.percent').mask('##0,00%', {reverse: true});
      $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
      $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
      $('.fallback').mask("00r00r0000", {
          translation: {
            'r': {
              pattern: /[\/]/,
              fallback: '/'
            },
            placeholder: "__/__/____"
          }
        });
      $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
    });

    // Máscara telefone
    var telefone = {
        onKeyPress: function(values, e, field, options) {
        var masks = ["00 0000-000099", "+00 00 00000-00009", "+000 00 0000-00009"],
        mask = values.length <= 13 ? masks[0] : (values.length < 18 ? masks[1] : masks[2]);
        $(".telefone_custom").mask(mask, options);
      }
    };

    $(".telefone_custom").mask("(00) 0000-0000", telefone);

    // Máscara CPF e CNPJ
    var cpf_cnpj = {
        onKeyPress: function(values, e, field, options) {
        var masks = ["000.000.000-009", "00.000.000/0000-00"],
        mask = values.length < 15 ? masks[0] : masks[1];
        $(".cpf_cnpj").mask(mask, options);
      }
    };

    $(".cpf_cnpj").mask("00.000.000/0000-00", cpf_cnpj);

    // Máscara porcentagem
    $('.percent_custom').mask('000,0', {
      reverse: true,
      onKeyPress: function(val, e, field, options) {
        if (val.replace(',', '.') > 100.0) {
          console.clear();
          console.log('Valor maximo 100,0 !');
          $('.percent_custom').val('');
        };
      }
    });

    // Validação dos campos  
    $("#formulario").validate({
      rules: {
        nome_vend: "required",
        sobrenome_vend: "required",
        nif_vend: "required",
        telefone_vend: "required",
        email_vend: "required",
        logradouro_vend: "required",
        num_vend: "required",
        cidade_vend: "required",
        estado_vend: "required",
        pais_vend: "required",

        nome_comp: "required",
        sobrenome_comp: "required",        
        logradouro_comp: "required",
        num_comp: "required",
        cidade_comp: "required",
        estado_comp: "required",
        pais_comp: "required",

        'qtde[]': "required",
        'unidade[]': "required",
        'prod_serv[]': "required",
        'moeda[]': "required",
        'valor[]': "required",

        pag_antecipado: "required",
        pag_prod: "required",
        pag_entregue: "required",
        data_faturamento: "required",
        prazo_entrega: "required"
      },
      messages: {
        nome_vend: "Campo obrigatório",
        sobrenome_vend: "Campo obrigatório",
        nif_vend: "Campo obrigatório",
        telefone_vend: "Campo obrigatório",
        email_vend: "Campo obrigatório",
        logradouro_vend: "Campo obrigatório",
        num_vend: "Campo obrigatório",
        cidade_vend: "Campo obrigatório",
        estado_vend: "Campo obrigatório",
        pais_vend: "Campo obrigatório",

        nome_comp: "Campo obrigatório",
        sobrenome_comp: "Campo obrigatório",        
        logradouro_comp: "Campo obrigatório",
        num_comp: "Campo obrigatório",
        cidade_comp: "Campo obrigatório",
        estado_comp: "Campo obrigatório",
        pais_comp: "Campo obrigatório",

        'qtde[]': "Campo obrigatório",
        'unidade[]': "Campo obrigatório",
        'prod_serv[]': "Campo obrigatório",
        'moeda[]': "Campo obrigatório",
        'valor[]': "Campo obrigatório",

        pag_antecipado: "Campo obrigatório",
        pag_prod: "Campo obrigatório",
        pag_entregue: "Campo obrigatório",
        data_faturamento: "Campo obrigatório",
        prazo_entrega: "Campo obrigatório"
      }
    });

      // Config das etapas do Formulário
      let current_fs, next_fs, prev_fs;

      function next(elem) {
        current_fs = $(elem).parents('fieldset');
        next_fs = $(elem).parents().next();

        $('#progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');
        current_fs.hide();
        next_fs.show();
      }

      $('.prev').click(function () {
        current_fs = $(this).parents('fieldset');
        prev_fs = $(this).parents().prev();

        $('#progresso li').eq($('fieldset').index(current_fs)).removeClass('ativo');
        current_fs.hide();
        prev_fs.show();
      });

      $("input[name=next]").click(function () {
        if ($('#formulario').valid()) {
          next($(this));
        };
      });

      $("input[name=finish]").click(function (event) {
        if ($('#formulario').valid()) {

        var myForm = document.getElementById('formulario');
        formData = new FormData(myForm);

          $.ajax({
            method: 'POST',
            url: 'enviar.php',
            data: formData,
            dataType: 'html',
            
            success: function (valor) {
              console.log(valor)
              if(valor == 'success') {
                Swal.fire(
                  'Sua Invoice foi gerada com sucesso!',
                  'Verifique seu e-mail.',
                  'success'
                );
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Algo deu errado! Tente novamente.'
                });
              };
            },
            cache: false,
            contentType: false,
            processData: false
          });   
        };       
      });

    // Add linha na tabela
    $('#new-docs').on('click', function () {
      let newRow = $('.newRow');
      newRow.append(
        '<tr><td><input name="qtde[]" class="form-control qtde" maxlength="8" required></td><td><select name="unidade[]" class="form-select" required><option selected></option><option>G</option><option>JG</option><option>LT</option><option>MWHORA</option><option>M</option><option>M2</option><option>M3</option><option>1000UN</option><option>PARES</option><option>QUILAT</option><option>KG</option><option>UN</option></select></td><td><input name="prod_serv[]" class="form-control inputTable" maxlength="20" required></td><td><select name="moeda[]" class="form-select" required><option selected></option><option value="USD">USD - Dólar Americano</option><option value="EUR">EUR - Euro</option><option value="AUD">AUD - Dólar Australiano</option><option value="CAD">CAD - Dólar Canadense</option><option value="CHF">CHF - Franco Suíço</option><option value="CLP">CLP - Peso Chileno</option><option value="CNH">CNH - Yuan chinês Offshore</option><option value="GBP">GBP - Libra Esterlina</option><option value="JPY">JPY - Iene Japonês</option><option value="SEK">SEK - Coroa Sueca</option></select></td><td><input name="valor[]" class="valor form-control money2" required></td><td><input name="total_linha[]" class="totalLinha form-control money2" readonly></td><td><button class="btn btn-danger btn-sm" type="button" name="remove-row">-</button></td></tr>',
      );
      $('.money2').mask("#.##0,00", { reverse: true })
    });

    // Remover última linha da tabela
    $(document).on('click', 'button[name=remove-row]', function () {
      let excluir = Swal.fire({
        title: 'Tem certeza?',
        text: "Você não será capaz de reverter isso!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, excluir!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          let tBody = $(this).parents('tr');
          tBody.remove();

          let totalDoc = 0.00;
          $('.totalLinha').each(function (index) {
          let valorLinha = $(this).val().replace(/\./g, '').replace(',', '.');

          if (valorLinha != '') {
            totalDoc += parseFloat(valorLinha);
          };
          });
          $('.totalDoc').val('Total: ' + totalDoc.toFixed(2).toString().replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1."));
          Swal.fire(
            'Excluído!',
            'Esse item foi excluído.',
            'success'
          );
        };
      });

      

    });

    // Calcular o valor total da linha
    $(document).on('keyup', '.valor, .qtde', function () {
      let valor = $(this).parents('tr').find('.valor'),
        qtde = $(this).parents('tr').find('.qtde').val(),
        total = $(this).parents('tr').find('.totalLinha'),
        calc = 0,
        totalDoc = 0.00;

      if (valor.val() != "") {
        valor = valor.val().replace(/\./g, '').replace(',', '.');
        calc = (valor * qtde);

        calc = calc.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.");
        total.val(calc);

        // Calcular o valor total do Doc
        $('.totalLinha').each(function (index) {
          let valorLinha = $(this).val().replace(/\./g, '').replace(',', '.');

          if (valorLinha != '') {
            totalDoc += parseFloat(valorLinha);
          };
        });
        $('.totalDoc').val('Total: ' + totalDoc.toFixed(2).toString().replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1."));
      };
    });
  </script>
</body>

</html>