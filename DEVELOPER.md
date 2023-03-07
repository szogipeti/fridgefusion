# Fridge Fusion - Developer Documentation

## Database

### Tables

#### recipes

| Key     | Name       | Data Type       | Description                                       | Restrictions   |
|---------|------------|-----------------|---------------------------------------------------|----------------|
| primary | id         | Unsigned Bigint | Unique Key                                        | Unique         |
|         | name       | String          | Name of Recipe                                    | Max-length: 50 |
|         | method     | Text            | Steps of making Recipe, separated with `;`        |                |
|         | category   | String          | Category of Recipe                                | Max-length: 25 |
|         | publisher  | String          | Publisher of Recipe                               | Max-length: 50 |
|         | image      | String          | Name of the image used in the Recipe              | Max-length: 25 |
|         | total_time | Integer         | The making of the Recipe in minutes               | Nullable       |
|         | serving    | Integer         | The number of dishes that can be made with Recipe | Nullable       |
|         | created_at | Timestamp       | Timestamp of creation                             | Nullable       |
|         | updated_at | Timestamp       | Timestamp of latest update                        | Nullable       |

##### Code snippet

```php
Schema::create('recipes', function (Blueprint $table) {
	$table->id();
	$table->string('name', 50);
	$table->text('method');
	$table->string('category', 25);
	$table->string('publisher', 50);
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

| Name            | HTTP method | Parameter of URL | Action  | Description        |
|-----------------|-------------|------------------|---------|--------------------|
| recipes.index   | GET         |                  | index   | Gets all recipes   |
| recipes.show    | GET         | /{id} - number   | show    | Gets one recipe    |
| recipes.store   | POST        |                  | store   | Creates new recipe |
| recipes.update  | PUT         | /{id} - number   | update  | Updates one recipe |
| recipes.destroy | DELETE      | /{id} - number   | destroy | Deletes one recipe |

[^1]: port can differ if it has been changed in the `.env` file