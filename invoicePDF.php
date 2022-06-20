<?php

$linha_tab = '';
$i = 0;
foreach ($_POST['qtde'] as $key) {
  $linha_tab .= '<tr><td class="qtde">'. $_POST['qtde'][$i] .'</td>
    <td class="unidade">'. $_POST['unidade'][$i] .'</td>
    <td class="prod_serv">'. $_POST['prod_serv'][$i] .'</td>
    <td class="moeda">'. $_POST['moeda'][$i] .'</td>
    <td class="valor">'. $_POST['valor'][$i] .'</td>
    <td class="total">'. $_POST['total_linha'][$i] .'</td>
  </tr>';
  $i++;
};

// Condicionais Canal Bancário

$cb_usd = '<li><strong>Intermediary Bank: </strong> The Bank Of New York Mellon</li>
<li><strong>Swift: </strong> IRVTUS3N </li>
<li><strong>Address: </strong> 240 Greenwich Street New York, NY 10286 </li>
<hr>
<li><strong>Beneficiary Bank: </strong> Banco BS2 S.A</li>
<li><strong>Swift: </strong> BBONBRSP</li>
<li><strong>Address: </strong> Av. Raja Gabaglia, 1143, 15º andar <br> Belo Horizonte/MG – CEP: 30380-403</li>
<li><strong>Account: </strong> 8901306894</li>
<hr>
<li><strong>Account/IBAN: </strong> BR5571027866000000000146013C1 </li>
<li><strong>Beneficiary Customer: </strong> '. $_POST['nome_vend'] .' '. $_POST['sobrenome_vend'] .'</li>';

$cb_eur = '<li><strong>Intermediary Bank: </strong> Commerzbank AG</li>
<li><strong>Swift: </strong> COBADEFF </li>
<hr>
<li><strong>Beneficiary Bank: </strong> Banco BS2 S.A</li>
<li><strong>Swift: </strong> BBONBRSP</li>
<li><strong>Address: </strong> Av. Raja Gabaglia, 1143, 15º andar <br> Belo Horizonte/MG – CEP: 30380-403</li>
<li><strong>Account: </strong> 400871803300EUR</li>
<hr>
<li><strong>Account/IBAN: </strong> BR5571027866000000000146013C1 </li>
<li><strong>Beneficiary Customer: </strong> '. $_POST['nome_vend'] .' '. $_POST['sobrenome_vend'] .'</li>';

$cb_aud = '<li><strong>Intermediary Bank: </strong> Commerzbank AG</li>
<li><strong>Swift: </strong> COBADEFF </li>
<hr>
<li><strong>Beneficiary Bank: </strong> Banco BS2 S.A</li>
<li><strong>Swift: </strong> BBONBRSP</li>
<li><strong>Address: </strong> Av. Raja Gabaglia, 1143, 15º andar <br> Belo Horizonte/MG – CEP: 30380-403</li>
<li><strong>Account: </strong> 400871803300AUD</li>
<hr>
<li><strong>Account/IBAN: </strong> BR5571027866000000000146013C1 </li>
<li><strong>Beneficiary Customer: </strong> '. $_POST['nome_vend'] .' '. $_POST['sobrenome_vend'] .'</li>';

$cb_cad = '<li><strong>Intermediary Bank: </strong> Commerzbank AG</li>
<li><strong>Swift: </strong> COBADEFFXXX </li>
<hr>
<li><strong>Beneficiary Bank: </strong> Banco BS2 S.A</li>
<li><strong>Swift: </strong> BBONBRSP</li>
<li><strong>Address: </strong> Av. Raja Gabaglia, 1143, 15º andar <br> Belo Horizonte/MG – CEP: 30380-403</li>
<li><strong>Account: </strong> 400871803300CAD</li>
<hr>
<li><strong>Account/IBAN: </strong> BR5571027866000000000146013C1 </li>
<li><strong>Beneficiary Customer: </strong> '. $_POST['nome_vend'] .' '. $_POST['sobrenome_vend'] .'</li>';

$cb_chf = '<li><strong>Intermediary Bank: </strong> Commerzbank AG</li>
<li><strong>Swift: </strong> COBADEFF </li>
<hr>
<li><strong>Beneficiary Bank: </strong> Banco BS2 S.A</li>
<li><strong>Swift: </strong> BBONBRSP</li>
<li><strong>Address: </strong> Av. Raja Gabaglia, 1143, 15º andar <br> Belo Horizonte/MG – CEP: 30380-403</li>
<li><strong>Account: </strong> 400871803300CHF</li>
<hr>
<li><strong>Account/IBAN: </strong> BR5571027866000000000146013C1 </li>
<li><strong>Beneficiary Customer: </strong> '. $_POST['nome_vend'] .' '. $_POST['sobrenome_vend'] .'</li>';

$cb_clp = '<li><strong>Intermediary Bank: </strong> Banco de Credito e Inversiones</li>
<li><strong>Swift: </strong> CREDCLRM</li>
<li><strong>Address: </strong> Vitacura 2939, Piso 8, Las Condes - Santiago</li>
<hr>
<li><strong>Beneficiary Bank: </strong> Custom House Financial (UK) Limited</li>
<li><strong>Swift: </strong> CREDCLRM</li>
<li><strong>Account: </strong> 10666664</li>
<li><strong>RUT (Tax ID): </strong> 592181509</li>
<hr>
<li><strong>Beneficiary Customer: </strong> Banco BS2 S.A</li>';

$cb_cnh = '<li><strong>Intermediary Bank: </strong> Commerzbank AG</li>
<li><strong>Swift: </strong> COBADEFF </li>
<hr>
<li><strong>Beneficiary Bank: </strong> Banco BS2 S.A</li>
<li><strong>Swift: </strong> BBONBRSP</li>
<li><strong>Address: </strong> Av. Raja Gabaglia, 1143, 15º andar <br> Belo Horizonte/MG – CEP: 30380-403</li>
<li><strong>Account: </strong> 400871803300CNH</li>
<hr>
<li><strong>Account/IBAN: </strong> BR5571027866000000000146013C1 </li>
<li><strong>Beneficiary Customer: </strong> '. $_POST['nome_vend'] .' '. $_POST['sobrenome_vend'] .'</li>';

$cb_gbp = '<li><strong>Intermediary Bank: </strong> The Bank Of New York Mellon</li>
<li><strong>Swift: </strong> IRVTGB2X </li>
<hr>
<li><strong>Beneficiary Bank: </strong> Banco BS2 S.A</li>
<li><strong>Swift: </strong> BBONBRSP</li>
<li><strong>Address: </strong> Av. Raja Gabaglia, 1143, 15º andar <br> Belo Horizonte/MG – CEP: 30380-403</li>
<li><strong>Account: </strong> 7949118260</li>
<hr>
<li><strong>Account/IBAN: </strong> GB21IRVT70022579491160 </li>
<li><strong>Beneficiary Customer: </strong> '. $_POST['nome_vend'] .' '. $_POST['sobrenome_vend'] .'</li>';

$cb_jpy = '<li><strong>Intermediary Bank: </strong> Commerzbank AG</li>
<li><strong>Swift: </strong> COBADEFF </li>
<hr>
<li><strong>Beneficiary Bank: </strong> Banco BS2 S.A</li>
<li><strong>Swift: </strong> BBONBRSP</li>
<li><strong>Address: </strong> Av. Raja Gabaglia, 1143, 15º andar <br> Belo Horizonte/MG – CEP: 30380-403</li>
<li><strong>Account: </strong> 400871803300JPY</li>
<hr>
<li><strong>Account/IBAN: </strong> BR5571027866000000000146013C1 </li>
<li><strong>Beneficiary Customer: </strong> '. $_POST['nome_vend'] .' '. $_POST['sobrenome_vend'] .'</li>';

$cb_sek = '<li><strong>Intermediary Bank: </strong> Commerzbank AG</li>
<li><strong>Swift: </strong> COBADEFF </li>
<hr>
<li><strong>Beneficiary Bank: </strong> Banco BS2 S.A</li>
<li><strong>Swift: </strong> BBONBRSP</li>
<li><strong>Address: </strong> Av. Raja Gabaglia, 1143, 15º andar <br> Belo Horizonte/MG – CEP: 30380-403</li>
<li><strong>Account: </strong> 400871803300SEK</li>
<hr>
<li><strong>Account/IBAN: </strong> BR5571027866000000000146013C1 </li>
<li><strong>Beneficiary Customer: </strong> '. $_POST['nome_vend'] .' '. $_POST['sobrenome_vend'] .'</li>';

switch ($_POST['moeda'][0]) {
  case 'USD':
    $cb_moeda = $cb_usd;
    break;
  case 'EUR':
    $cb_moeda = $cb_eur;
    break;
  case 'AUD':
    $cb_moeda = $cb_aud;
    break;
  case 'CAD':
    $cb_moeda = $cb_cad;
    break;
  case 'CHF':
    $cb_moeda = $cb_chf;
    break;
  case 'CLP':
    $cb_moeda = $cb_clp;
    break;
  case 'CNH':
    $cb_moeda = $cb_cnh;
    break;
  case 'GBP':
    $cb_moeda = $cb_gbp;
    break;
  case 'JPY':
    $cb_moeda = $cb_jpy;
    break;
  case 'SEK':
    $cb_moeda = $cb_sek;
    break;
}



$invoicePDF =  '

<style>
  .container {
    font-family: sans-serif;
    text-transform: uppercase;
    font-size: 13px;
    max-width: 900px;
    margin-top: 30px;
  }

  h1 {
    text-align: center;
  }

  .flex-cards {
    padding-top: 35px;
  }

  .card-left {
    float: left;
    width: 45%;

  }

  .card-right {
    float: right;
    width: 50%;
  }

  .header-card {
    color: #FFF;
    margin-top: -25px;
    padding: 8px;
    font-weight: bold;
    background-color: #007bff;
  }

  ul {
    list-style-type: none;
    padding-left: 5px;
    padding-top: 10px;
  }

  li {
    padding-top: 5px;
  }

  table {
    border-collapse: collapse;
    border-bottom: 1px solid #ddd;
    width: 100%;
    margin-top: 250px;
    margin-bottom: 50px;
  }

  thead {
    background-color: #007bff;
  }

  th,
  td {
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2
  }

  th {
    color: white;
    text-align: center;
  }

  .valor,
  .total,
  .prazo_entrega,
  .data_faturamento {
    text-align: right;
  }

  .qtde,
  .unidade,
  .moeda,
  .prod_serv {
    text-align: center;
  }

  .ul_fat {
    text-align: right;
  }
</style>

<body>

  <div class="container">
    
    <div class="flex-cards">

      <div class="card-left">
        <div class="header-card">
          Invoice to
        </div>
        <ul>
          <li><strong>Nome: </strong> '. $_POST['nome_vend'] .'</li>
          <li><strong>Sobrenome: </strong> '. $_POST['sobrenome_vend'] .'</li>
          <li><strong>NIF: </strong> '. $_POST['nif_vend'] .'</li>
          <li><strong>E-mail: </strong> '. $_POST['email_vend'] .'</li>
          <li><strong>Telefone: </strong> '. $_POST['telefone_vend'] .'</li>
          <li><strong>Endereço: </strong> '. $_POST['logradouro_vend'] .' '. $_POST['num_vend'] .' '. $_POST['comp_vend'] .'</li>
          <li>'. $_POST['cidade_vend'] .' / '. $_POST['estado_vend'] .' - '. $_POST['pais_vend'] .'</li>
        </ul>
      </div>

      <div class="card-right">
        <div class="header-card">
          Ship-to
        </div>
        <ul>
          <li><strong>Nome: </strong> '. $_POST['nome_comp'] .'</li>
          <li><strong>Sobrenome: </strong> '. $_POST['sobrenome_comp'] .'</li>
          <li><strong>Sobrenome: </strong> '. $_POST['nif_comp'] .'</li>
          <li><strong>E-mail: </strong> '. $_POST['email_comp'] .'</li>
          <li><strong>Telefone: </strong> '. $_POST['telefone_comp'] .'</li>
          <li><strong>Endereço: </strong> '. $_POST['logradouro_comp'] .' '. $_POST['num_comp'] .' '. $_POST['comp_comp'] .'</li>
          <li>'. $_POST['cidade_comp'] .' / '. $_POST['estado_comp'] .' - '. $_POST['pais_comp'] .'</li>
        </ul>
      </div>

    </div>

    <table>
      <thead>
        <tr>
          <th scope="col">Qtde</th>
          <th scope="col">Unidade</th>
          <th scope="col">Produto/Serviço</th>
          <th scope="col">Moeda</th>
          <th scope="col">Valor</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
      '. $linha_tab .'
      </tbody>
    </table>

    <div class="flex-cards">

      <div class="card-left">
        <div class="header-card">
          Pay to
        </div>
        <ul>
          '. $cb_moeda .'
        </ul>
      </div>

      <div class="card-right">
        <div class="total header-card">
          <span class="total_doc">' . $_POST['total_doc'] .'</span>
        </div>
        <ul class="ul_fat">
        <li><strong>Faturamento</strong></li>
          <li><strong>Prazo de entrega: </strong> '. $_POST['prazo_entrega'] .'</li>
          <hr>
          <li><strong>Esquema de Pagamento</strong></li>
          <li><strong>Antecipado: </strong> '. $_POST['pag_antecipado'] .'</li>
          <li><strong>Produção/Serviço: </strong> '. $_POST['pag_prod'] .'</li>
          <li><strong>Desembaraçado/Entregue: </strong> '. $_POST['pag_entregue'] .'</li>
        </ul>      
      </div>

    </div>

  </div>

</body>

';

?>