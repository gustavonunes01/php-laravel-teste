# Projeto de teste

## :computer: Tecnologias utilizadas
- PHP  >=  7.3
- Laravel framework 8
- [Composer](https://getcomposer.org/download) (dependency manager)

## 💡 Requerimentos
- PHP >= 7.3 or higher (you can download PHP [here](https://www.php.net/downloads)).
- [Composer](https://getcomposer.org/download) (dependency manager).

## :gear: Instalação
1. Clone o projeto.
```bash
git clone https://github.com/gustavonunes01/php-laravel-teste.git
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
1. Vá novamente até a pasta `php-laravel-teste` e execute:
```bash
php artisan serve --port 8000
```

2. Agora navegue até http://localhost:8000 no seu navegador.

3. Use o migrate e o seeder
```bash
   php artisan migrate && php artisan db:seed --class=CustomersTableSeeder
```
