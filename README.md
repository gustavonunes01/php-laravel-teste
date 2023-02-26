# Projeto de teste :upd8

## :computer: Tecnologias utilizadas
- PHP  >=  7.3
- Laravel framework 8
- [Composer](https://getcomposer.org/download) (dependency manager)

## 💡 Requerimentos
- PHP >= 7.3 or higher (you can download PHP [here](https://www.php.net/downloads)).
- [Composer](https://getcomposer.org/download) (dependency manager).
- [Read our instructions](https://www.mercadopago.com/developers/en/guides/overview#bookmark_el_desarrollo_con_c%C3%B3digo) on how to create an application at the Mercado Pago Developer Panel in order to acquire your public key and access token. They will grant you access to Mercado Pago's public APIs.

## :gear: Instalação
1. Clone o projeto.
```bash
git clone https://github.com/gustavonunes01/upd8-teste.git
```

2. Vai até a pasta do projeto.
```bash
cd upd8-teste
```

3. Instale os vendors necessários com Composer.
```bash
composer install
```

## 🌟 Agora como usar
1. Vá novamente até a pasta `upd8-teste` e execute:
```bash
php artisan serve --port 8000
```

2. Agora navegue até http://localhost:8000 no seu navegador.

3. Use o migrate e o seeder
```bash
   php artisan migrate && php artisan db:seed --class=CustomersTableSeeder
```