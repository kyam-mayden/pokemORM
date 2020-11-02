# PokemORM

##### A laravel app to showcase basic how-to of eloquent, using pokemon as an example database

### Prerequisites
- Developed on a Homestead VM with Phing installed globally

### Build
- Run phing build from the application root directory to build the app
- Run php artisan migrate:fresh --seed to reseed the db

### Todo
- Battle seeder
- Elite four?
- Decide between front end table or just json response
- Decide to TDD?
- Set up the routes/front end
- Add plan for each lesson in readme

### Branches/Lessons
#### For each eloquent method, put raw query alongside
- Defining models - table, fillable/guarded, casts

- RAW db queries
- Query Builder
#### basics
- Selects
    - lesson_1/get
- Inserts
    - lesson_2/insert
- Updates
    - lesson_3/update
- Deletes
    - lesson_4/delete
#### more advanced
- Relationships/joins
    - lesson_5/join
- Sub-selects
- Unions

Further reading
- Collections
