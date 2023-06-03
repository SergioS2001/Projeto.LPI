<div class="card">
    <div class="card-body">
        <h5 class="card-title" style="padding: 10px;">
            <span style="background-color: red; color: white; padding: 5px 10px; border-radius: 5px;">
                Obrigatório
            </span>
        </h5>
        <h5 class="card-title" style="padding: 10px;">
            <span style="background-color: blue; color: white; padding: 5px 10px; border-radius: 5px;">
                Política de Utilização de Dados Pessoais
            </span>
        </h5>
        <p class="card-text">
        Os termos de aceitação e consentimento relativos a Estágios encontram-se definidos de acordo com a Política de Utilização de Dados Pessoais que a seguir se descreve.<br><br>
O Responsável pelo Tratamento da sua candidatura é a Fundação Fernando Pessoa, que poderá contatar através do endereço postal Praça 9 de Abril, 349 – 4249-004  Porto, ou em alternativa pelo 22 507 13 00.<br><br>
O Encarregado da Proteção de Dados (DPO) pode ser contatado através do endereço postal do Responsável pelo Tratamento, ou em alternativa, através do email <a href="mailto:dpo@ufp.edu.pt" style="color: blue; text-decoration: underline;">dpo@ufp.edu.pt</a>. <br><br>
A finalidade do tratamento dos Dados Pessoais facultados com o consentimento do Estagiário, é permitir a execução dos procedimentos de apreciação/seriação da candidatura que o estagiário apresentou e/ou mera gestão administrativa. Também será possível a sua utilização para fins tão-somente estatísticos.<br>
Ainda no seguimento do processo de candidatura/realização de estágio, poderá ser necessário recorrer, quer à ficha curricular, quer ao CV do candidato a estagiário.<br><br>
Os Dados Pessoais do Estagiário são conservados durante 5 anos, após o qual serão eliminados, ou, caso seja do interesse da Fundação Fernando Pessoa, poderão ser anonimizados de tal modo que o Estagiário não seja, ou já não possa, ser identificado.<br>
O destinatário dos seus Dados Pessoais é:<br><br>
- O ​Gabinete de Estágios, Formação e de Educação para a Saúde  (GEFES).<br><br>
Poderá vir a verificar-se a transferência dos seus dados pessoais para outro(s) departamento(s) da estrutura da Fundação Fernando Pessoa, quando tal se afigure necessário 
para responder a oportunidades de emprego que entretanto surjam. 
Estamos a referir em concreto, o departamento de Recursos Humanos, a Administração e outras Direções e/ou funções relevantes para a 
análise da candidatura que se está a avaliar.<br><br>
Os seus dados pessoais também podem ser partilhados com outras entidades quando exigido por lei, ou para responder a um processo legal, e ainda em situações que impliquem a proteção de vidas, a segurança dos serviços e a proteção dos direitos de propriedade da Fundação Fernando Pessoa.<br>
O processo de seleção não envolve a tomada de decisões automatizadas, incluindo a definição de perfis.<br><br>
Não são realizadas comparações, interconexões ou qualquer outra forma de interrelacionar as informações registadas.<br><br>
Carece de consentimento o tratamento posterior dos dados pessoais, para um fim que não seja aquele para o qual os dados tenham sido recolhidos.<br><br>
O Candidato tem o direito de apresentar reclamação a uma Autoridade de Controlo da União Europeia em relação à proteção dos seus Dados Pessoais. A Fundação Fernando Pessoa prestará a sua colaboração à Autoridade de Controlo, facultando-lhe todas as informações que por esta, no exercício das suas competências, lhe forem solicitadas.<br><br>
O Estagiário tem o direito de retirar o seu consentimento em qualquer altura, sem comprometer a licitude do tratamento efetuado com base no consentimento previamente dado, e o direito de solicitar à Fundação Fernando Pessoa acesso aos Dados Pessoais que 
lhe digam respeito, bem como a sua retificação ou o seu apagamento, e a limitação do tratamento no que disser respeito ao Estagiário, ou do direito de se opor ao tratamento, bem como do direito à portabilidade dos dados.<br><br>
A Fundação Fernando Pessoa aplica medidas técnicas e organizativas adequadas para assegurar um nível de segurança apropriado ao risco de manter em arquivo os Dados Pessoais dos estagiários.<br><br>
A Fundação Fernando Pessoa dispõe de um sistema informático com capacidade de resistir, com um dado nível de confiança, a eventos acidentais ou a ações maliciosas ou ilícitas, que comprometam a disponibilidade, a autenticidade, a integridade e a confidencialidade dos Dados Pessoais conservados ou transmitidos, bem como a segurança dos serviços conexos oferecidos ou acessíveis através destas redes e sistemas.<br><br>
A qualquer momento pode alterar os consentimentos dados. Basta para tal, utilizar o e-mail: <a href="mailto:gefes.he@ufp.edu.pt" style="color: blue; text-decoration: underline;">gefes.he@ufp.edu.pt</a> ou contactar por escrito para a seguinte morada: Hospital-Escola Fernando Pessoa – GEFES; Avenida Fernando Pessoa, 150 4420-096 Gondomar, Portugal.<br><br>
        </p>
        <div style="text-align: center; margin-top: 20px;">
    <form action="{{ route('dashboard.update') }}" method="POST" style="display: inline-block;">
        @method('POST')
        @csrf
        <button id="accept-button" value="1" class="btn btn-primary">Aceito</button>
    </form>
    <button type="submit" name="politica_dados_accepted" value="0" class="btn btn-primary" style="display: inline-block; background-color: red;">Não Aceito</button>
</div>

    </div>
</div>


<style>
    .btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        border: none;
    }

    .btn-danger:hover {
        background-color: #a52d38;
    }
</style>
