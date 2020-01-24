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

php artisan make:model Models\\City -m
```
