<?php

//////////////////////////////////////////////////////////////////////
// O Arquivo 'functions' possui funções comuns à todos os arquivos, //
// assim como variáveis de conexão e identificação                  //
//////////////////////////////////////////////////////////////////////
include_once '../Common/functions.php';

/*
 * Exemplo de XML
 *
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:hor="http://www.saude.gov.br/horus-ws/schemas/v1/HorusTypes">
   <soapenv:Header/>
   <soapenv:Body>
      <hor:informarEntradaMedicamentoEmLote>
         <identificacao>
            <idOrigem>?</idOrigem>
            <coIBGE>?</coIBGE>
         </identificacao>
         <!--1 or more repetitions:-->
         <registro>
            <estabelecimento>
               <!--Optional:-->
               <coCNES>?</coCNES>
               <!--Optional:-->
               <coTipoEstabelecimento>?</coTipoEstabelecimento>
            </estabelecimento>
            <produto>
               <!--Optional:-->
               <coRegistroOrigem>?</coRegistroOrigem>
               <nuProduto>?</nuProduto>
               <nuLote>?</nuLote>
               <dtValidade>?</dtValidade>
               <qtProduto>?</qtProduto>
               <dtRegistro>?</dtRegistro>
               <!--Optional:-->
               <sgProgramaSaude>?</sgProgramaSaude>
               <!--Optional:-->
               <coIUM>?</coIUM>
               <!--Optional:-->
               <nuCNPJFabricante>?</nuCNPJFabricante>
               <!--Optional:-->
               <noFabricanteInternacional>?</noFabricanteInternacional>
               <nuNotaFiscal>?</nuNotaFiscal>
               <nuValorUnitario>?</nuValorUnitario>
               <nuCNPJDistribuidor>?</nuCNPJDistribuidor>
               <tpEntradaEstoque>?</tpEntradaEstoque>
            </produto>
         </registro>
      </hor:informarEntradaMedicamentoEmLote>
   </soapenv:Body>
</soapenv:Envelope>

 */

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// array associativo de registros                                                                                                                                                                      //
// dentro da variável $registros, podem ser inseridos quantos arrays forem necessários, cada conjunto de arrays dentro desta variável, e considerado um registro                                       //
// cada registro é composto por:                                                                                                                                                                       //
// Um array de estabelecimento e um array de produto:                                                                                                                                                  //
//                                                                                                                                                                                                     //
// Array de Estabelecimento:                                                                                                                                                                           //
// coCNES, coTipoEstabelecimento                                                                                                                                                                       //
//                                                                                                                                                                                                     //
// Array de Produto:                                                                                                                                                                                   //
// coRegistroOrigem,nuProduto,nuLote,dtValidade,qtProduto,dtRegistro,sgProgramaSaude,coIUM,nuCNPJFabricante,noFabricanteInternacional,nuNotaFiscal,nuValorUnitario,nuCNPJDistribuidor,tpEntradaEstoque //
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$registros = [
  [ //exemplo registro 1
    'estabelecimento'                 => [                  //obrigatório
       'coCNES'                       => '5717493'          //opcional
      ,'coTipoEstabelecimento'        => 'A'                //opcional
    ]
    ,'produto'                        => [                  //obrigatório
      'coRegistroOrigem'              => '123'              //opcional
      ,'nuProduto'                    => 'EBR0266630U0118'  //obrigatório
      ,'nuLote'                       => '123'              //obrigatório
      ,'dtValidade'                   => '01-01-2020'       //obrigatório
      ,'qtProduto'                    => '123'              //obrigatório
      ,'dtRegistro'                   => '30-10-2017'       //obrigatório
      ,'sgProgramaSaude'              => 'DST'              //opcional
      ,'coIUM'                        => '123'              //opcional
      ,'nuCNPJFabricante'             => '00530493000171'   //opcional
      ,'noFabricanteInternacional'    => 'FABRICANTE'       //opcional
      ,'nuNotaFiscal'                 => '1324'             //obrigatório
      ,'nuValorUnitario'              => '1234.1234'        //obrigatório
      ,'nuCNPJDistribuidor'           => '00530493000171'   //obrigatório
      ,'tpEntradaEstoque'             => 'E-O'              //obrigatório
    ]
  ],
  [ // exemplo registro 2
    'estabelecimento'                 => [                  //obrigatório
       'coCNES'                       => ''                 //opcional
      ,'coTipoEstabelecimento'        => ''                 //opcional
    ]
    ,'produto'                        => [                  //obrigatório
      'coRegistroOrigem'              => ''                 //opcional
      ,'nuProduto'                    => 'EBR0266630U0118'  //obrigatório
      ,'nuLote'                       => '123'              //obrigatório
      ,'dtValidade'                   => '01-01-2020'       //obrigatório
      ,'qtProduto'                    => '123'              //obrigatório
      ,'dtRegistro'                   => '30-10-2017'       //obrigatório
      ,'sgProgramaSaude'              => ''                 //opcional
      ,'coIUM'                        => ''                 //opcional
      ,'nuCNPJFabricante'             => ''                 //opcional
      ,'noFabricanteInternacional'    => ''                 //opcional
      ,'nuNotaFiscal'                 => '1324'             //obrigatório
      ,'nuValorUnitario'              => '1234.1234'        //obrigatório
      ,'nuCNPJDistribuidor'           => '00530493000171'   //obrigatório
      ,'tpEntradaEstoque'             => 'E-O'              //obrigatório
    ]
  ],
  [ // exemplo registro 3
    'estabelecimento'                 => [                  //obrigatório
    ]
    ,'produto'                        => [                  //obrigatório
       'nuProduto'                    => 'EBR0266630U0118'  //obrigatório
      ,'nuLote'                       => '123'              //obrigatório
      ,'dtValidade'                   => '01-01-2020'       //obrigatório
      ,'qtProduto'                    => '123'              //obrigatório
      ,'dtRegistro'                   => '30-10-2017'       //obrigatório
      ,'nuNotaFiscal'                 => '1324'             //obrigatório
      ,'nuValorUnitario'              => '1234.1234'        //obrigatório
      ,'nuCNPJDistribuidor'           => '00530493000171'   //obrigatório
      ,'tpEntradaEstoque'             => 'E-O'              //obrigatório
    ]
  ]
];


try{

  // link do webservice com as credenciais para acesso
  $client = new SoapClient(AMBIENTE,['login'=>EMAIL,'password'=>SENHA]);

  // remove campos opcionais
  removeOptional($registros);

  // Array de argumentos da requisição, ou "Body" do XML
  $arguments = [
      'hor:informarEntradaMedicamentoEmLote' => [
        'identificacao' => ['idOrigem' => IDORIGEM,'coIBGE' => COIBGE]
        ,'registro' => $registros
      ]
  ];

  //envio da requisição
  $protocolo = $client->__soapCall("informarEntradaMedicamentoEmLote", $arguments);

  // resposta da requisição
  ver($protocolo);

} catch (SoapFault $e){
  //O erro do Web Service ou mensagem de falha para ser tratado.
  ver($e);
}

?>