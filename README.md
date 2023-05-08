# Stripe teste
- Acesse seu painel na [stripe](https://dashboard.stripe.com/login).
<aside>
⚠️ Os passos a seguir presupoem que você já tenha o ambiente para desenvolvimento com framework laravel usando banco de dados mysql configurado e yarn instalado em sua maquina.

</aside>

## Instalação e configuração

### Instalação

- Faça o donwload ou clone do projeto em [https://github.com/GislaineFrandalozo/use-stripe-test](https://github.com/GislaineFrandalozo/use-stripe-test)
    - `$ git clone https://github.com/GislaineFrandalozo/use-stripe-test.git`
- Vá até a raiz do projeto e rode:
    - `$ composer install`
    - `$ yarn`

### Configuração

- Na raiz do projeto digite:
    - `$ cp .env.example .env`
    - `$ php artisan key:generate`
    - Edite o arquivo .env:
        
         Adicionar as variaveis do stripe STRIPE_KEY e STRIPE_SECRET, procure no painel do stripe por suas variaveis:
        
        ![image](https://user-images.githubusercontent.com/86322789/236731010-d29d756b-8781-4022-b0ea-e81b170e7fdd.png)

        
    - Atualizar as cofigurações do banco de dados:
        - DB_DATABASE=
        - DB_USERNAME=
        - DB_PASSWORD=
- No painel stripe procure por “produtos” e adione um novo plano. Atualize o arquivo use-stripe-test/database/seeders/PlanSeeder com as coonfigurações do seu plano.
    - A coluna 'stripe_plan' estara disponivel em “ID DA API”
        
        ![image](https://user-images.githubusercontent.com/86322789/236731075-c6561f48-4dbd-4322-8942-19ab58a08651.png)
        
- Digite no terminal na raiz do projeto `$ php artisan migrate --seed`

### Iniciando o projeto

- Para iniciar o projeto digite no terminal na raiz do projeto:
- `$ yarn dev`
- `$ php artisan serve`
- Vá até [http://127.0.0.1:8000/](http://127.0.0.1:8000/) em seu navegador e aparecerá a página de login do projeto.

## Testando

- Realize um cadastro na plataforma (nome, sobrenome, email e senha).
- A pagina de perfil é a principal, botão de checkout aparecerá apenas se o usuario não tenha realizado assinatura ainda.
- Na pagina de perfil é possivel o usuario visualizar e editar seus dados. Também é possivel desconectar da conta a partir dessa pagina.
- Caso usuario não possua assinatura apenas infromações sobre perfil e botão de checkout irão aparecer, mas caso usuario tenha assinatura o botão some e é possivel visualizar e editar infromações sobre pagamento.
- Para testar **atualização** do cartão complete os campos do formulario do endereço e cartão com um numero válido (visa ou mastercard), validade qualquer data nao vencida, cvc qualquer numero e cp qualquer valor. Verefique numeros de cartão validos em [https://stripe.com/docs/testing#cards](https://stripe.com/docs/testing#cards) .
- Para **realizar a assinatura** clique no botão “checkout” complete os campos do formulario endereço e do cartão, um numero válido visa ou mastercard, validade qualquer data nao vencido, cvc qualquer numero e cp qualquer valor. Verefique numeros de cartão validos em [https://stripe.com/docs/testing#cards](https://stripe.com/docs/testing#cards) . Após clicar em assinar aguarde até ser redirecionado para pagina de perfil.

---
