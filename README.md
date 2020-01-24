# Repo para registro treinamento Laradock - Relationships
Utilizado material gratuíto disponibilizado pela equipe EspecializaTi.
[Curso de Laravel Relationships](https://www.youtube.com/playlist?list=PLVSNL1PHDWvSk2zxNTYzGRnPMQTFyrYUi)

## Aula 02 Criando Tabelas OneToOne

```bash
# Criando Model + migration Country
php artisan make:model Models\\Country -m

# Criando Model + migration Location
php artisan make:model Models\\Location -m
```

# Aula 03 criando controller OneToOne

```bash
php artisan make:controller OneToOneController
```


# Aula 06 criando controller OneToMany

```bash
php artisan make:controller OneToManyController

php artisan make:model Models\\State -m
artisan
php artisan make:model Models\\City -m
```

# Aula 13 criando Model Company

```bash
php artisan make:model Models\\Company -m

php  make:migration create_company_city_table
```

# Aula 14 Relacionamento Many To Many

```bash
php artisan make:controller ManyToManyController
```

Um ponto inportante, quando criar tabelas pivot, deve-se respeitar ordem aufabética das tabelas relacionadas. 
No nosso caso Tabelas company e city.
deveriamos ter criado migration para city_company e nao para company_city como realizado.


# Aula 17 Relacionamento Polymorphic

```bash
php artisan make:controller PolymorphicController

php artisan make:model Models\\Comment -m
```
