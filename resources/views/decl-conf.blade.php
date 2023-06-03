<div class="card">
    <div class="card-body">
        <h5 class="card-title" style="padding: 10px;">
            <span style="background-color: red; color: white; padding: 5px 10px; border-radius: 5px;">
                Obrigatório
            </span>
        </h5>
        <h5 class="card-title" style="padding: 10px;">
            <span style="background-color: blue; color: white; padding: 5px 10px; border-radius: 5px;">
            Declaração de Confidencialidade
            </span>
        </h5>
        <p class="card-text">
        Declaro que desempenharei as funções de que fui incumbido(a) com absoluta fidelidade, zelo e diligência, mantendo rigoroso respeito e obediência às regras sobre sigilo profissional e, consequentemente, comprometendo-me a não revelar, por qualquer forma, factos de natureza reservada ou confidencial de que tenha conhecimento no exercício de tais funções inerentes ao estágio/ ensino clínico supracitado.
        <br>Comprometo-me, também, a não registar (por exemplo, em registo fotográfico), e a não partilhar, os registos e informações pessoais dos utentes que estejam sob observação/intervenção no âmbito das minhas atividades letivas.
        <br><br>Declaro, ainda, ter conhecimento do Código de Conduta Ética e assumo o compromisso individual do seu cumprimento.
        </p>
        <div style="text-align: center; margin-top: 20px;">
    <form action="{{ route('dashboard.updateconf') }}" method="POST" style="display: inline-block;">
        @method('POST')
        @csrf
        <button id="accept-button" value="1" class="btn btn-primary">Aceito</button>
    </form>
    <button type="submit" name="decl_conf_accepted" value="0" class="btn btn-primary" style="display: inline-block; background-color: red;">Não Aceito</button>
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
