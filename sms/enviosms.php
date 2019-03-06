<?php

/*
 * Como Enviar SMS utilizando a API da Assertiva.
 * 
 * Informações sobre a API
 * 
 * por Fabio Alvaro
 * em 06/Março/2019
 * 
 * Utilizado com php 7.2
 */

//Mostra os erros!
error_reporting(E_ALL);
ini_set("display_errors", 1);



//Define as variaveis e o caminho 
//URL DA API DA ASSERTIVA
//VERIFIQUE NA DOCUMENTAÇÃO SE ESSA É A MAIS ATUALIZADA!
$url = 'https://services-elb.assertivasolucoes.com.br:443/v1/sms/6000/envio_VERIQUE_A_URL';


// CODIGO QUE VOCE RECEBE AO ENTRAR EM CONTATO COM O PESSOAL DO SUPORTE 
// DA ASSERTIVA
$authorization = 'COLOQUE_SUA_AUTORIZATION_AQUI';
$bodyPost = '{
                        "id": "123",
                        "custoId": 1,
                        "nome": "NomeCampanha",
                        "rota": "1",
                        "dataEnvio": "2018-06-27 11:30:00.000",
                        "smsList": [
                          {
                            "id": "123",
                            "mensagem": "Uhulll Gato.. Lindo do papai pelo php puro!",
                            "dataEnvio": "2018-06-27 11:30:00.000",
                            "numero": "COLOQUE_SEU_NUMERO_AQUI"
                          }
                        ]
                      }';

//Abra a Conexão com o Curl!

$ch = curl_init();

//Configura o Header
$headers = array(
    "Content-Type: application/json",
    "Authorization: " . $authorization
);

//Envia o body e os parametros para a API
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $bodyPost);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

//Envia o comando para a API
$result = curl_exec($ch);



//Exibe a Resposta
print_r($result);



//Fecha a conexão
curl_close($ch);
