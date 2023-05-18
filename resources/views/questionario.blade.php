@php
    use App\Models\Estágios;
    use App\Models\Orientação_Estagios;
    $user = Auth::user();
@endphp

<!-- Include the form-validation.js file -->
<script src="{{ asset('resources/js/form-validation.js') }}"></script>

<form class="my-form" action="{{ route('questionário.store') }}" method="POST">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <label>Tendo em vista a melhoria contínua dos serviços prestados, pretende-se com o preenchimento deste questionário 
    que reflita e aprecie a forma e as condições em que realizou o seu estágio/ensino clínico, sendo um momento destinado à 
    identificação dos aspetos positivos e negativos, mas também à apresentação de sugestões/comentários.</label><br>
    <label>Avaliação do estágio<br>
Por favor, marque a opção que melhor expressar a sua opinião relativamente aos diferentes parâmetros:<br></label>
    <label for="estagio">Estágio/EC realizado:</label>
    <select name="estagio" id="estagio">
    @foreach(Estágios::whereIn('id', function($query) {
        $query->select('estágios_id')->from('orientação_estagios')->where('users_id', Auth::id());
    })->get() as $estagio)
        <option value="{{ $estagio->id }}">{{ $estagio->nome }}</option>
    @endforeach
    </select><br>
    <label for="integração">Integração:</label>
<select name="integração" id="integração">
  <option value="1">1 (Insuficiente)</option>
  <option value="2">2 (Suficiente)</option>
  <option value="3">3 (Bom)</option>
  <option value="4">4 (Muito Bom)</option>
  <option value="5">5 (Excelente)</option>
</select>
<label for="acompanhamento">Acompanhamento por parte do Orientador Local:</label>
<select name="acompanhamento" id="acompanhamento">
  <option value="1">1 (Insuficiente)</option>
  <option value="2">2 (Suficiente)</option>
  <option value="3">3 (Bom)</option>
  <option value="4">4 (Muito Bom)</option>
  <option value="5">5 (Excelente)</option>
</select>
<label for="aquisição_conhecimentos">Aquisição de novos conhecimentos:</label>
<select name="aquisição_conhecimentos" id="aquisição_conhecimentos">
  <option value="1">1 (Insuficiente)</option>
  <option value="2">2 (Suficiente)</option>
  <option value="3">3 (Bom)</option>
  <option value="4">4 (Muito Bom)</option>
  <option value="5">5 (Excelente)</option>
</select>
<label for="disponibilidade">Disponibilidade de meios e equipamentos:</label>
<select name="disponibilidade" id="disponibilidade">
  <option value="1">1 (Insuficiente)</option>
  <option value="2">2 (Suficiente)</option>
  <option value="3">3 (Bom)</option>
  <option value="4">4 (Muito Bom)</option>
  <option value="5">5 (Excelente)</option>
</select>
<label for="satisfação">Satisfação das expectativas:</label>
<select name="satisfação" id="satisfação">
  <option value="1">1 (Insuficiente)</option>
  <option value="2">2 (Suficiente)</option>
  <option value="3">3 (Bom)</option>
  <option value="4">4 (Muito Bom)</option>
  <option value="5">5 (Excelente)</option>
</select>
<label for="apoio_administrativo">Apoio administrativo (prestado pelo CEFES):</label>
<select name="apoio_administrativo" id="apoio_administrativo">
  <option value="1">1 (Insuficiente)</option>
  <option value="2">2 (Suficiente)</option>
  <option value="3">3 (Bom)</option>
  <option value="4">4 (Muito Bom)</option>
  <option value="5">5 (Excelente)</option>
</select>
<label for="apoio_orientador">Acompanhamento prestado pelo Orientador( Instituição de Ensino proveniente):</label>
<select name="apoio_orientador" id="apoio_orientador">
  <option value="1">1 (Insuficiente)</option>
  <option value="2">2 (Suficiente)</option>
  <option value="3">3 (Bom)</option>
  <option value="4">4 (Muito Bom)</option>
  <option value="5">5 (Excelente)</option>
</select>
<br><br>
<label for="apreciação_global">Apreciação Global do Estágio:</label>
<select name="apreciação_global" id="apreciação_global">
  <option value="1">1 (Insuficiente)</option>
  <option value="2">2 (Suficiente)</option>
  <option value="3">3 (Bom)</option>
  <option value="4">4 (Muito Bom)</option>
  <option value="5">5 (Excelente)</option>
</select>
    <label for="sugestões">Sugestões/ comentários:<br>
Por favor, utilize o espaço seguinte para registar sugestões/ comentários sobre o Estágio/Ensino Clínico.</label>
<input class="form-control large-input" type="text" name="sugestões" id="sugestões">
    <br>
    <!--
    <label for="protecao_dados">Garantia de proteção de dados pessoais:<br>
A recolha dos dados pessoais integrados na presente ficha e o tratamento dos mesmos são da exclusiva responsabilidade do CEFES e tem como finalidade a avaliação dos estágios/ensinos clínicos realizados no HE-UFP.<br>
O titular dos dados pessoais tem o direito a aceder, atualizar, modificar ou apagar os seus elementos, bastando para tal comunicar à instituição o seu interesse através do correio eletrónico <a href="mailto:cefes.he@ufp.edu.pt" style="color: blue; text-decoration: underline;">cefes.he@ufp.edu.pt</a>.<br>
Para mais detalhes, por favor, ler a Política de Privacidade do HE-UFP, disponível em <a href="https://he.ufp.pt/rgpd" style="color: blue; text-decoration: underline;">https://he.ufp.pt/rgpd</a>.</label>
<button class="btn btn-primary" type="submit">Tomei conhecimento</button>
    <br><br>
    -->
    <label for="autorização_guardar_contacto">Autoriza que o seu contacto faça parte da nossa rede para a divulgação relativa a possíveis ofertas de estágio/emprego, outras atividades relacionadas com empregabilidade e eventos de índole técnico‐científico?</label>
<button class="btn btn-primary" type="submit">Sim</button>
<button class="btn btn-primary" type="submit">Não</button>
    <br>
</form>

<style>
    .my-form label {
        display: block;
        margin-bottom: 5px;
    }

    .my-form input,
    .my-form select {
        display: block;
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .my-form button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #007bff;
        border: none;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
    }

    .my-form button:hover {
        background-color: #0069d9;
    }

    .my-form .alert {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 4px;
    }

    .my-form .alert ul {
        margin: 0;
        padding: 0;
    }

    .my-form .alert li {
        margin-left: 20px;
    }


    .large-input {
    height: 100px;
}
</style>