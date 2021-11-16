# PokemORM

### A laravel app to show how to use Eloquent, using pokemon as an example database

## Prerequisites
- Developed on Docker
- Temporarily halt any docker containers using 127.0.0.1 ports 80 and 3306

## Build - can take up to 30 mins
- Git Clone the repo
- Make a .env file: `cp .env.example .env`
- Install dependencies: `docker run --rm -u "$(id -u):$(id -g)" -v $(pwd):/var/www/html -w /var/www/html laravelsail/php80-composer:latest composer install --ignore-platform-reqs`
- Make the sail Docker File(s): `php artisan sail:publish`
- Start the docker containers: `./vendor/bin/sail up -d`
- Open the container CLI: `./vendor/bin/sail shell`
- Build the application: `./vendor/bin/phing build`


## Interact
- View the database with your MySQL GUI, using the credentials `DB_DATABASE` & `DB_USERNAME` in `.env`
- Alternatively, navigate to 127.0.0.1 in your browser
- Also, you can take advantage of Laravel Tinker to interact with the application, eg:
  - `sail artisan tinker`
  - `$battle = App\Battle::create(['trainer_1' => 1, 'trainer_2' => 2, 'winner_id' => 1]);` - will create a new Battle row

## Playground
Alternatively, interact with the models and data via [Laravel Playground](https://laravelplayground.com/#/snippets/4c623444-5360-42fe-b093-8b3c2120db4e)

# Lesson Plan
## Basics
- Models
- Selects
- Inserts
- Updates
- Deletes
## Intermediate
- Relationships/joins
    - lesson5
- Scopes
    - lesson6
- Accessors & mutators
    - lesson7

## Further reading
- Collections
- Sub-selects
- Unions

## Documentation & Reading

### Docs

[Laravel](https://laravel.com/docs/8.x)

[Eloquent](https://laravel.com/docs/8.x/eloquent)

[Eloquent Collections](https://laravel.com/docs/8.x/eloquent-collections)

#### Courses I liked

[Test Driven Laravel](https://course.testdrivenlaravel.com/)

[Eloquent Performance Patterns](https://eloquent-course.reinink.ca/)

[Advanced Eloquent](https://laraveldaily.teachable.com/p/laravel-eloquent-expert-level)

#### Other Stuff

[Slides](https://docs.google.com/presentation/d/14GPIT8JuxxKgZiQM1G4LOOp1VfkYeXy1DEzCEyFBY6k/edit?usp=sharing)

[Article on ORM's](https://fideloper.com/how-we-code)

### Todo
- Elite four?
- Nice front end forms/tables
- graphQL api
- SOAP api
