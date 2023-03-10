<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
    <div id="inputContainer">
        <form id="registerForm" action="register.blade.php" method="POST">
            <h1>Criar conta</h1>
            <p>
            <label for="firstname">Primeiro Nome</label>
            <input id="firstname" maxlength="32" type="text" placeholder="First name" required>
            <label for="lastname">Ultimo Nome</label>
            <input id="lastname" maxlength="32" type="text" placeholder="Last name" required>
            </p>
            <p>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" placeholder="Email" required/>
            </p>
            <p>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" placeholder="Password" required/>
            <label for="password">Repetir Password</label>
            <input id="password-confirm" type="password" placeholder="Confirm Password" name="password_confirmation" required/>
            </p>    
            <p>
            <label for="telemovel">Telemovel</label>
            <input id="telemovel" type="text" name="telemovel" required/>
            <label for="idade">Idade</label>
            <input id="idade" type="int" name="idade" placeholder="Age" required/>
            </p>
            <p>
            <label for="cartaocidadao">Cartão de Cidadão</label>
            <input id="cartaocidadao" type="int" name="cartaocidadao" required/>
            </p>
            <p>
            <label for="instituicao">Instituicao de Ensino:</label>
            <select name="instuicao" id="instituicao">
            <option value="UFP">Universidade Fernando Pessoa</option>
            <option value="v2">Outra</option>
            </select>
            </p>
            <p>
            <label for="numeroaluno">Numero de aluno</label>
            <input id="numeroaluno" type="int" name="numeroaluno" required/>
            </p>
            <input type="submit" value="Registar" class="btn solid" />
        </form>
    </div>

</body> 

</html>