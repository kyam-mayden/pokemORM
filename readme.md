# PokemORM

##### A laravel app to showcase basic how-to of eloquent, using pokemon as an example database

### Prerequisites
- Developed on a Homestead VM with Phing installed globally

### Build

- Run phing build from the application root directory to build the app
- Run php artisan migrate:fresh --seed to reseed the db

### Todo
- Gym Leader join table
- Battle seeder
- Elite four?
- Decide between front end table or just json response
- Decide to TDD?
- Set up the routes/front end

### Branches/Lessons
#### For each eloquent method, put raw query alongside
- Defining models - table, fillable/guarded, casts

- RAW db queries
#### basics
- Selects - findOrFail
- Inserts - firstOrCreate
- Updates
- Deletes
#### more advanced
- Relationships/joins
- Sub-selects
- Unions

Further reading
- Collections
