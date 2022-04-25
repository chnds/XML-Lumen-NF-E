<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use DOMDocument;

class SaoCarlosController extends BaseController
{

    public function __construct()
    {
    }

    public function test()
    {
        $url= 'http://webservice.giap.com.br/WSNfsesScarlos02/nfseresources/ws/hello';
                
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url."?".'GET'); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
            $result = curl_exec($ch); 
        $err = curl_error($ch);

        if ($err) {
        echo "cURL Error #:" . $err;
        }  else {
        return $result; 
        }	
        curl_close ($ch); 
        
    }

    public function consultar(request $request)
    {
        $url = 'http://webservice.giap.com.br/WSNfsesScarlos02/nfseresources/ws/consulta';

        //$string1 = '999991';
        //$string2 = '2978937BMA';

        $xml = <<<EOT
        <?xml version="1.0"?>
        <consulta>
            <inscricaoMunicipal>$request->inscricaoMunicipal</inscricaoMunicipal> 
            <codigoVerificacao>$request->inscricaoMunicipal</codigoVerificacao>
        </consulta>
        EOT;

        $dom = new DomDocument;
        $dom->preserveWhiteSpace = FALSE;
        $dom->loadXML($xml);

        $arquivo = $dom->saveXML();

        $opts = array('http' =>
            array(
                'method' => 'POST',
                'header' => 'Content-type: application/xml;charset=ISO-8859-1',
                'content' => $arquivo
            )
        );

        $context = stream_context_create($opts);
        $result = file_get_contents($url, false,
        $context);
        echo $result;
    }

    public function cancelar(request $request)
    {
        $url = 'http://webservice.giap.com.br/WSNfsesScarlos02/nfseresources/ws/v2/cancela';

        //$string1 = '8';
        //$string2 = '35';

        $xml = <<<EOT
        <?xml version="1.0" encoding="ISO-8859-1" standalone="yes"?>
        <cancelaNota>
            <codigoMotivo>$request->codigoMotivo</codigoMotivo>
            <numeroNota>$request->numeroNota</numeroNota>
        </cancelaNota>
        EOT;

        $dom = new DomDocument;
        $dom->preserveWhiteSpace = FALSE;
        $dom->loadXML($xml);

        $arquivo = $dom->saveXML();

        $opts = array('http' =>
            array(
                'method' => 'POST',
                'header' => 'Authorization: 8PT8YPN3V1M46JPXYI79I2O05OKWK3ZZ', //parametro Authorization, ao qual tera que ser composto da Inscrição-TOKEN
                'content' => $arquivo
            )
        );

        $context = stream_context_create($opts);
        $result = file_get_contents($url, false,
        $context);
        echo $result;
    }

    public function emissao()
    {
        $url = 'http://webservice.giap.com.br/WSNfsesScarlos02/nfseresources/ws/v2/emissao';

        $xml = <<<EOT
        <?xml version="1.0"?>
        <nfe>
            <notaFiscal>
            <dadosPrestador>
            <dataEmissao>02/08/2019</dataEmissao>
            <im>00008</im>
            <numeroRps>0009</numeroRps>
            </dadosPrestador>
            <dadosServico>
            <bairro>CENTRO</bairro>
            <cep>01378-056</cep>
            <cidade>SAO BERNARDO</cidade>
            <complemento>TERREO</complemento>
            <logradouro>Rua Continental</logradouro>
            <numero>345</numero>
            <pais>BRASIL</pais>
            <uf>SP</uf>
            </dadosServico>
            <dadosTomador>
            <bairro>Vila Vermelha</bairro>
            <cep>04218-048</cep>
            <cidade>SAO PAULO</cidade>
            <complemento>Sala 23A</complemento>
            <documento>18023609807</documento>
            <email>teste@teste.com.br</email>
            <ie>ISENTO</ie>
            <logradouro>Rua Ostenda</logradouro>
            <nomeTomador>NOME TOMADOR</nomeTomador>
            <numero>93</numero>
            <pais>BRASIL</pais>
            <tipoDoc>J</tipoDoc>
            <uf>SP</uf>
            </dadosTomador>
            <detalheServico>
            <cofins>0.00</cofins>
            <csll>0.00</csll>
            <deducaoMaterial>0.00</deducaoMaterial>
            <descontoIncondicional>0</descontoIncondicional>
            <inss>0.00</inss>
            <ir>0.00</ir>
            <issRetido>0.00</issRetido>
            <item>
            <aliquota>0.0</aliquota>
            <codigo>0702</codigo>
            <descricao>Locacao de galpao p funilaria</descricao>
            <valor>100</valor>
            </item>
            <obs>Servicos realizados inloco.</obs>
            <pisPasep>0.00</pisPasep>
            </detalheServico>
            </notaFiscal>
            <notaFiscal>
            <dadosPrestador>
            <dataEmissao>02/08/2019</dataEmissao>
            <im>00008</im>
            <numeroRps>0009</numeroRps>
            </dadosPrestador>
            <dadosServico>
            <bairro>CENTRO</bairro>
            <cep>01378-056</cep>
            <cidade>SAO BERNARDO</cidade>
            <complemento>TERREO</complemento>
            <logradouro>Rua Continental</logradouro>
            <numero>345</numero>
            <pais>BRASIL</pais>
            <uf>SP</uf>
            </dadosServico>
            <dadosTomador>
            <bairro>Vila Vermelha</bairro>
            <cep>04218-048</cep>
            <cidade>SAO PAULO</cidade>
            <complemento>Sala 23A</complemento>
            <documento>18023609807</documento>
            <email>teste@teste.com.br</email>
            <ie>ISENTO</ie>
            <logradouro>Rua Ostenda</logradouro>
            <nomeTomador>NOME TOMADOR</nomeTomador>
            <numero>93</numero>
            <pais>BRASIL</pais>
            <tipoDoc>J</tipoDoc>
            <uf>SP</uf>
            </dadosTomador>
            <detalheServico>
            <cofins>0.00</cofins>
            <csll>0.00</csll>
            <deducaoMaterial>0.00</deducaoMaterial>
            <descontoIncondicional>0</descontoIncondicional>
            <inss>0.00</inss>
            <ir>0.00</ir>
            <issRetido>0.00</issRetido>
            <item>
            <aliquota>0.0</aliquota>
            <codigo>0702</codigo>
            <descricao>Locacao de galpao p funilaria</descricao>
            <valor>100</valor>
            </item>
            <obs>Servicos realizados inloco.</obs>
            <pisPasep>0.00</pisPasep>
            </detalheServico>
            </notaFiscal>
        </nfe>
        EOT;

        $dom = new DomDocument;
        $dom->preserveWhiteSpace = FALSE;
        $dom->loadXML($xml);

        $arquivo = $dom->saveXML();

        $opts = array('http' =>
            array(
                'method' => 'POST',
                'header' => 'Authorization: 8PT8YPN3V1M46JPXYI79I2O05OKWK3ZZ', //parametro Authorization, ao qual tera que ser composto da Inscrição-TOKEN
                'content' => $arquivo
            )
        );

        $context = stream_context_create($opts);
        $result = file_get_contents($url, false,
        $context);
        echo $result;
    }



}
