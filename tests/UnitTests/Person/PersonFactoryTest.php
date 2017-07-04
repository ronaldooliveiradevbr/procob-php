<?php

namespace Procob\Tests\UnitTests\Procob\Person;

use \DateTimeImmutable;
use Procob\Person\Person;
use Procob\Person\PersonFactory;
use \Faker\Provider\pt_BR\Person as FakerPerson;
use \PHPUnit\Framework\TestCase;

class PersonFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function mustCreatePersonObject()
    {
        $responseGet = json_decode($this->responseGet());

        $person = PersonFactory::create($responseGet);

        $this->assertInstanceOf(
            Person::class,
            $person
        );

        $this->assertInstanceOf(
            \DateTimeImmutable::class,
            $person->getBirthday()
        );

        $this->assertInstanceOf(
            \DateTimeImmutable::class,
            $person->getIrpfVerifiedAt()
        );
    }

    public function responseGet()
    {
        return '{"code":"000","message":"Consulta de testes com dados fict\u00edcios.","date":"2016-10-17","hour":"09:55:51","revision":"11399","server":"3","content":{"nome":{"existe_informacao":"SIM","conteudo":[{"documento":"99999999999","tipo_documento":"PF","nome":"JO\u00c3O DA SILVA","data_nascimento":"15\/06\/1979","idade":"26","signo":"G\u00eameos","obito":"NAO","sexo":"M","uf":"RS,CE,","situacao_receita":"REGULAR","situacao_receita_data":"2016-10-17","situacao_receita_hora":"11:02:49"}]},"dados_parentes":{"existe_informacao":"SIM","conteudo":[{"documento":"88888888888","nome":"MARIA DA SILVA","campo":"mae","obito":"NAO","tipo_beneficio":"","aposentado":"NAO"}]},"pessoas_contato":{"existe_informacao":"SIM","conteudo":[{"documento":"77777777777","nome":"LUIZ SOUZA","endereco":"SAO CLEMENTE","bairro":"CENTRO","cep":"44642000","cidade":"VARJOTA","uf":"CE"}]},"pesquisa_enderecos":{"existe_informacao":"SIM","conteudo":[{"logradouro":"RUA","endereco":"SAO CLEMENTE","bairro":"CENTRO","cidade":"VARJOTA","numero":"13","cep":"44642000","bloco":"","apto":"","casa":"","quadra":"","lote":"","complemento":"","uf":"CE"}]},"trabalha_trabalhou":{"existe_informacao":"SIM","conteudo":[{"documento":"92787126000176","nome":"PADARIA PETER P\u00c3O","logradouro":"RUA","endereco":"IN\u00c1CIO DA SILVA","bairro":"CENTRO","cidade":"CURITIBA","numero":"999","cep":"87878787","bloco":"","apartamento":"","casa":"","quadra":"","lote":"","complemento":"","uf":"PR","telefones":[{"ddd":"99","telefone":"99999999","tipo":"fixo"}]}]},"contato_preferencial":{"existe_informacao":"SIM","conteudo":{"telefone_fixo":{"ddd":"99","telefone":"99999999"},"telefone_celular":{"ddd":"99","telefone":"99999999"},"telefone_outros":{"ddd":"41","telefone":"33333333"},"parentes":{"documento":"99999999999","nome":"MATHEUS ALENCAR","tipo":"pai"},"contatos":{"documento":"99999999999","nome":"MARIA ROBERTA PEREIRA"},"empregador":{"documento":"99999999999","nome":"JOAO NASCIMENTO SANTOS"},"email":"email@email.com","endereco":{"endereco":"FRANCISCO JOSE","numero":"42","cidade":"Curitiba","estado":"PR","cep":"99999999"}}},"residentes_mesmo_domicilio":{"existe_informacao":"SIM","conteudo":[{"nome":"CARLA TEIXEIRA","documento":"99999999999"},{"nome":"LUIZ PEREIRA","documento":"99999999999"}]},"emails":{"existe_informacao":"SIM","conteudo":[{"email":"joao@email.com"},{"email":"joao.fernando@email2.com"}]},"numero_beneficio":{"existe_informacao":"SIM","conteudo":{"numero":"999999999","ano_aposentadoria":"7","tipo_aposentadoria":"Aposentadoria Por Tempo De Contribui\u00e7\u00e3o","aposentado":"SIM","inss":"SIM","acidente_trabalho":"SIM","afastado_doenca":"SIM","emprestimo":"SIM","banco_nome":"Ita\u00fa Unibanco S.A.","banco_agencia":"DUQUE DE CAXIAS\/JARDIM PRIMAVERA","banco_endereco":"ROD. WASHINGTON LUIZ, S\/N\u00ba","banco_numero":"0","banco_complemento":"QUADRA 3 - LOTE 5","banco_bairro":"PARQUE SANTA L\u00daCIA","banco_c_e_p":"99999999","banco_cidade":"DUQUE DE CAXIAS","banco_estado":"RJ"}},"alerta_participacoes":{"existe_informacao":"SIM","conteudo":{"existe":"SIM","quantidade":3}},"pesquisa_telefones":{"existe_informacao":"SIM","conteudo":{"fixo":[{"ddd":"51","telefone":"11111111","operadora":"Embratel  - Fixo"}],"celular":[{"ddd":"41","telefone":"22222222","operadora":"TIM - Celular"}],"outros":[{"ddd":"41","telefone":"33333333","operadora":"OI - Fixo"}],"comercial":[{"ddd":"51","telefone":"66666666","operadora":"Embratel  - Fixo"}]}},"outros_documentos":{"existe_informacao":"SIM","conteudo":[{"tipo":"titulo_de_eleitor","documento":"999999999999"},{"tipo":"pis","documento":"99999999999"}]}}}';
    }
}
