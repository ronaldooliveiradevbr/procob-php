<?php

namespace ProcobTests\UnitTests\Company;

use \PHPUnit\Framework\TestCase;
use Procob\Company\Company;
use Procob\Company\CompanyFactory;

class CompanyFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function mustCreateCompanyObject()
    {
        $responseGet = json_decode($this->responseGet());
        $company = CompanyFactory::create($responseGet);

        $this->assertInstanceOf(Company::class, $company);

        $this->assertInstanceOf(
            \DateTimeImmutable::class,
            $company->getVerifiedAt()
        );
    }

    public function responseGet()
    {
        return '{"code":"000","message":"Pesquisa feita com sucesso","date":"2017-03-01","hour":"13:43:35","revision":"11399","server":"3","content":{"nome":{"existe_informacao":"SIM","conteudo":[{"documento":"99999999999999","tipo_documento":"PJ","nome":"PADARIA FAMILIA","nome_fantasia":"PADARIA FAMILIA DOCES E SALGADOS","data_nascimento":"15\/06\/1979","idade":"13","obito":"NAO","sexo":"","uf":"PR,","situacao_receita":"ATIVA","situacao_receita_data":"2017-03-01","situacao_receita_hora":"16:56:07","cnae1":"99.99-9-99","descricao_cnae1":"VENDA DE DOCES","cnae2":"99.99-9-88","descricao_cnae2":"62.01-5-01"}]},"dados_parentes":{"existe_informacao":"NAO"},"pessoas_contato":{"existe_informacao":"SIM","conteudo":[{"documento":"99999999999","nome":"FERNANDA PEREIRA","endereco":"R SAO clemente","cep":"99999999","cidade":"VARJOTA","uf":"CE","pontuacao":"0"},{"documento":"88888888888","nome":"JOAO PEREIRA","endereco":"AV PRESIDENTE GETULIO VARGAS","cep":"88888888","cidade":"TORRES","uf":"RS","pontuacao":"0"}]},"pesquisa_enderecos":{"existe_informacao":"SIM","conteudo":[{"logradouro":"","endereco":"RUA BUENOS AIRES","bairro":"CENTRO","cidade":"CURITIBA","numero":"65","cep":"99999999","bloco":"","apto":"","casa":"","quadra":"","lote":"","complemento":"BL A SL 206","uf":"PR","pontuacao":"0"},{"logradouro":"","endereco":"RUA BERNARDO CAMPOS","bairro":"CENTRO","cidade":"CURITIBA","numero":"30","cep":"88888888","bloco":"","apto":"","casa":"","quadra":"","lote":"","complemento":"SL 1","uf":"PR","pontuacao":"0"}]},"trabalha_trabalhou":{"existe_informacao":"NAO"},"contato_preferencial":{"existe_informacao":"SIM","conteudo":{"telefone_fixo":{"ddd":"99","telefone":"99999999"},"telefone_celular":{"ddd":"99","telefone":"99999999"},"telefone_outros":{"ddd":"41","telefone":"33333333"},"parentes":{"documento":"99999999999","nome":"MATHEUS ALENCAR","tipo":"pai"},"contatos":{"documento":"99999999999","nome":"MARIA ROBERTA PEREIRA"},"empregador":{"documento":"99999999999","nome":"JOAO NASCIMENTO SANTOS"},"email":"email@email.com","endereco":{"endereco":"FRANCISCO JOSE","numero":"42","cidade":"Curitiba","estado":"PR","cep":"99999999"}}},"residentes_mesmo_domicilio":{"existe_informacao":"NAO"},"emails":{"existe_informacao":"SIM","conteudo":[{"email":"joao@email.com"},{"email":"joao.fernando@email2.com"}]},"numero_beneficio":{"existe_informacao":"NAO"},"alerta_participacoes":{"existe_informacao":"SIM","conteudo":{"quantidade":"2"}},"pesquisa_telefones":{"existe_informacao":"SIM","conteudo":{"fixo":[{"ddd":"51","telefone":"11111111","operadora":"Embratel  - Fixo"}],"celular":[{"ddd":"41","telefone":"22222222","operadora":"TIM - Celular"}],"outros":[{"ddd":"41","telefone":"33333333","operadora":"OI - Fixo"}],"comercial":[{"ddd":"51","telefone":"66666666","operadora":"Embratel  - Fixo"}]}},"alerta_monitore":{"existe_informacao":"NAO"},"outros_documentos":{"existe_informacao":"NAO"}}}';
    }
}
