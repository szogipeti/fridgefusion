# Fridge Fusion - Developer Documentation

Fridge Fusion is a website for helping people make recipes from their owned ingredients.

The backend containing the API
was done with Laravel. The API controllers, request and resources are found in the Http folder, and the models in the
Models folder, both of these in the app folder. The API routes are in the `api.php` file located in the routes folder.
Everything connecting to the database is in the database folder. It
includes the migrations in the migration folder, and the seeders in the seeder folder. The images are stored
in `storage/app/img` from where it is linked to the public folder. The unit tests are found in the tests folder. Every
configuration file can be found in the config folder.

The fronted was done with Vue.js. All the files are located inside the resources folder. Inside the css folder we have
the global styles in `app.scss`. In the views folder we have our only page, `welcome.blade.php` which inherits
the `main.blade.php` file in the layouts folder. All Vue.js files are located inside the js folder. These include the
components, router, stores, utils and views, all of it in its respective folder.

Our team consists of three ambitious student: Dénes Donát, Szögi Péter and Vastag Krisztián

For the design we have decided to keep everything simple. We chose two main colors: a greenish blue, and slightly dim
red. These colors make the website look modern and straightforward.

## Database

### Tables

#### users

| Key     | Name              | Data Type       | Description                     | Restrictions |
|---------|-------------------|-----------------|---------------------------------|--------------|
| primary | id                | Unsigned Bigint | Unique Key                      | Unique       |
|         | username          | String          | Username of User                | Unique       |
|         | email             | String          | Email of User                   | Unique       |
|         | email_verified_at | Timestamp       | Verification timestamp of email | Nullable     |
|         | password          | String          | Hashed code of password         |              |

```php
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('username')->unique();
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->rememberToken();
    $table->timestamps();
});
```

#### recipes

| Key               | Name         | Data Type       | Description                                       | Restrictions   |
|-------------------|--------------|-----------------|---------------------------------------------------|----------------|
| primary           | id           | Unsigned Bigint | Unique Key                                        | Unique         |
|                   | name         | String          | Name of Recipe                                    | Max-length: 50 |
|                   | method       | Text            | Steps of making Recipe, separated with `;`        |                |
|                   | category     | String          | Category of Recipe                                | Max-length: 25 |
| foreign(users-id) | publisher_id | Unsigned Bigint | Id of the Recipe publisher                        |                |
|                   | image        | String          | Name of the image used in the Recipe              | Max-length: 25 |
|                   | total_time   | Integer         | The making of the Recipe in minutes               | Nullable       |
|                   | serving      | Integer         | The number of dishes that can be made with Recipe | Nullable       |
|                   | created_at   | Timestamp       | Timestamp of creation                             | Nullable       |
|                   | updated_at   | Timestamp       | Timestamp of latest update                        | Nullable       |

##### Code snippet

```php
Schema::create('recipes', function (Blueprint $table) {
	$table->id();
	$table->string('name', 50);
	$table->text('method');
	$table->string('category', 25);
    $table->foreignId('publisher_id')->constrained('users');
	$table->string('image', 25);
	$table->integer('total_time')->nullable();
	$table->integer('serving')->nullable();
	$table->timestamps();
});
```

#### categories

| Key     | Name          | Data Type       | Description                | Restrictions   |
|---------|---------------|-----------------|----------------------------|----------------|
| primary | id            | Unsigned Bigint | Unique Key                 | Unique         |
|         | name          | String          | Name of Category           | Max-length: 50 |
|         | created_at    | Timestamp       | Timestamp of creation      | Nullable       |
|         | updated_at    | Timestamp       | Timestamp of latest update | Nullable       |

##### Code snippet

```php
Schema::create('categories', function (Blueprint $table) {
	$table->id();
	$table->string('name', 50);
	$table->timestamps();
});
```

#### ingredients

| Key                    | Name        | Data Type       | Description                | Restrictions   |
|------------------------|-------------|-----------------|----------------------------|----------------|
| primary                | id          | Unsigned Bigint | Unique Key                 | Unique         |
|                        | name        | String          | Name of Ingredient         | Max-length: 25 |
| foreign(categories-id) | category_id | Unsigned Bigint | Foreign Key of Category    |                |
|                        | created_at  | Timestamp       | Timestamp of creation      | Nullable       |
|                        | updated_at  | Timestamp       | Timestamp of latest update | Nullable       |

##### Code snippet

```php
Schema::create('ingredients', function (Blueprint $table) {
	$table->id();
	$table->string('name', 25);
	$table->foreignId('category_id')->constrained('categories');
	$table->timestamps();
});
``` 

#### measures

| Key     | Name                | Data Type       | Description                                          | Restrictions   |
|---------|---------------------|-----------------|------------------------------------------------------|----------------|
| primary | id                  | Unsigned Bigint | Unique Key                                           | Unique         |
|         | name                | String          | Name of Measure                                      |                |
|         | standard_measure_id | Integer         | Id of standard Measure                               |                |
|         | conversion_rate     | Double          | Rate of conversion between this and standard Measure |                |
|         | created_at          | Timestamp       | Timestamp of creation                                | Nullable       |
|         | updated_at          | Timestamp       | Timestamp of latest update                           | Nullable       |

##### Code snippet

```php
Schema::create('measures', function (Blueprint $table) {
	$table->id();
	$table->string('name', 25);
	$table->integer('standard_measure_id');
	$table->double('conversion_rate');
	$table->timestamps();
});
```

#### made_from

| Key                     | Name          | Data Type       | Description                | Restrictions |
|-------------------------|---------------|-----------------|----------------------------|--------------|
| foreign(recipes-id)     | recipe_id     | Unsigned Bigint | Foreign Key of Recipe      |              |
| foreign(ingredients-id) | ingredient_id | Unsigned Bigint | Foreign Key of Ingredient  |              |
| foreign(measures-id)    | measure_id    | Unsigned Bigint | Foreign Key of Measure     |              |
| foreign(categories-id)  | category_id   | Unsigned Bigint | Foreign Key of Category    |              |
|                         | created_at    | Timestamp       | Timestamp of creation      | Nullable     |
|                         | updated_at    | Timestamp       | Timestamp of latest update | Nullable     |

##### Code snippet

```php
Schema::create('made_from', function (Blueprint $table) {
	$table->foreignId('recipe_id')->constrained('recipes');
	$table->foreignId('ingredient_id')->constrained('ingredients');
	$table->foreignId('measure_id')->constrained('measures');
	$table->double('quantity')->nullable();
	$table->timestamps();
});
```

#### valid_measures

| Key                     | Name          | Data Type       | Description                | Restrictions |
|-------------------------|---------------|-----------------|----------------------------|--------------|
| foreign(measures-id)    | measure_id    | Unsigned Bigint | Foreign Key of Measure     |              |
| foreign(ingredients-id) | ingredient_id | Unsigned Bigint | Foreign Key of Ingredient  |              |
|                         | created_at    | Timestamp       | Timestamp of creation      | Nullable     |
|                         | updated_at    | Timestamp       | Timestamp of latest update | Nullable     |

##### Code snippet

```php
Schema::create('valid_measures', function (Blueprint $table) {
	$table->foreignId('measure_id')->constrained('measures');
	$table->foreignId('ingredient_id')->constrained('ingredients');
	$table->timestamps();
});
```

\pagebreak

## Rest API

**Base URL: `https://localhost:8881/api/`** [^1]

### Recipe

**URL for model: `/recipes`**
**Controller: RecipeController**

| Name            | HTTP method | Parameter of URL | Action  | Description        | Requirements  |
|-----------------|-------------|------------------|---------|--------------------|---------------|
| recipes.index   | GET         |                  | index   | Gets all recipes   |               |
| recipes.show    | GET         | `/{id}` - number | show    | Gets one recipe    |               |
| recipes.store   | POST        |                  | store   | Creates new recipe | Authenticated |
| recipes.update  | PUT         | `/{id}` - number | update  | Updates one recipe | Authenticated |
| recipes.destroy | DELETE      | `/{id}` - number | destroy | Deletes one recipe | Authenticated |

#### RecipeResource

- id
- name
- method (Array)
- category
- publisher_id
- image
- total_time
- serving
- ingredients (Array):
    - ingredient_id
    - measure_id
    - quantity

### Ingredient

**URL for model: `/ingredients`**
**Controller: IngredientController**

| Name              | HTTP method | Parameter of URL | Action | Description          |
|-------------------|-------------|------------------|--------|----------------------|
| ingredients.index | GET         |                  | index  | Gets all ingredients |
| ingredients.show  | GET         | `/{id}` - number | show   | Gets one ingredient  |

#### IngredientResource

- id
- name
- category
- validMeasures (Array)

### Measure

**URL for model: `/measures`**
**Controller: MeasureController**

| Name           | HTTP method | Parameter of URL | Action | Description       |
|----------------|-------------|------------------|--------|-------------------|
| measures.index | GET         |                  | index  | Gets all measures |
| measures.show  | GET         | `/{id}` - number | show   | Gets one measure  |

#### MeasureResource

- id
- name
- standard_measure_id
- conversion_rate

### User

**URL for model: `/useres`**
**Controller: UserController**

| Name       | HTTP method | Parameter of URL | Action | Description   |
|------------|-------------|------------------|--------|---------------|
| users.show | GET         | `/{id}` - number | show   | Gets one user |

#### UserResource

- id
- username

### Auth

**Controller: AuthController**

| Name          | HTTP method | URL         | Action | Description                       | Requirements  |
|---------------|-------------|-------------|--------|-----------------------------------|---------------|
| auth.login    | POST        | `/login`    | index  | Sends login request               |               |
| auth.register | POST        | `/register` | show   | Sends register request            |               | 
| auth.profile  | GET         | `/profile`  | show   | Gets details of logged in profile | Authenticated |
| auth.logout   | POST        | `/logout`   | show   | Sends logout request              | Authenticated |

#### AuthResource

- username
- token

[^1]: port can differ if it has been changed in the `.env` file