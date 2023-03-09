```{=tex}
\chapter{ECMAScript}
```

# Fridge Fusion - Test Documentation

This is the Testing Documentation of Fridge Fusion. The documentation contains unit tests for the API, selenium tests
for the features and displays, and manual tests for every other case. The unit tests were made with Laravel's built-in
testing. The selenium tests were done in c# with .Net Core 7.

## API Tests

### Recipe API

| Name                | Description                                           | Prerequisites                                                            | Steps                                                                                                                                                                                                | Expected Result                                                                                         |  Success  | Author      | Date          |
|---------------------|-------------------------------------------------------|--------------------------------------------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------------------------------|:---------:|-------------|---------------|
| test_get_all_recipe | Send GET Request to API and receive all Recipes       | Database and API is running on Docker;<br/> Database migrated and seeded | 1. Sends GET Request to `http://localhost:8881/api/recipes`                                                                                                                                          | Length is equal to the length of Recipes in Database; <br/>Received Recipe is the first of the Database |  &check;  | Szögi Péter | 2023. 03. 02. |
| test_get_recipe     | Send GET Request to API and receive first Recipe      | Database and API is running on Docker;<br/> Database migrated and seeded | 1. Sends GET Request to `http://localhost:8881/api/recipes/1`                                                                                                                                        | Received Recipe is the first of the Database                                                            |  &check;  | Szögi Péter | 2023. 03. 02. |
| test_create_recipe  | Send POST Request to API and create Recipe            | Database and API is running on Docker;<br/> Database migrated and seeded | 1. Gets Access token of `gastroworkshop` user <br/> 2. Creates `RECIPE1` <br/>3. Sends POST Request to `http://localhost:8881/api/recipes` with `RECIPE1` in body and bearer access token in header  | Response status is 201; <br/> `RECIPE1` has been created in Database                                    |  &check;  | Szögi Péter | 2023. 03. 02. |
| test_update_recipe  | Send PUT Request to API and update selected Recipe    | Database and API is running on Docker;<br/> Database migrated and seeded | 1. Gets Access token of `gastroworkshop` user <br/> 2. Creates `RECIPE1` <br/>3. Sends Put Request to `http://localhost:8881/api/recipes/1` with `RECIPE1` in body and bearer access token in header | Response status is 200; <br/> First Recipe has been updated to `RECIPE1` in Database                    |  &check;  | Szögi Péter | 2023. 03. 02. |
| test_delete_recipe  | Send Delete Request to API and delete selected Recipe | Database and API is running on Docker;<br/> Database migrated and seeded | 1. Gets Access token of `gastroworkshop` user <br/> 2. Finds selected Recipe <br/>3. Sends DELETE Request to `http://localhost:8881/api/recipes/1` and bearer access token in header                 | Response status is 200; <br/> First Recipe is missing from Database                                     |  &check;  | Szögi Péter | 2023. 03. 02. |

#### RECIPE1

```php
"name" => "Alma",
"method" => [
    "1. Preheat oven to 350 degrees. Spray a small (4 \u2013 5 cup) baking dish with non-stick cooking spray.",
    "2. In a mixing bowl stir together cream cheese, sour cream, mayonnaise, garlic, parmesan, mozzarella and pepper.",
    "3. Stir in artichokes and spinach.",
    "4. Spread mixture evenly into prepared baking dish.",
    "5. Bake in preheated oven until heated through and melty, about 20 minutes.",
    "6. Serve warm."
],
"category" => "Appetizer",
"publisher_id" => 1,
"image" => "1.jpg",
"total_time" => 35,
"serving" => 4,
"ingredients" => [
    [
        "ingredient_id" => 1,
        "measure_id" => 15,
        "quantity" => 0
    ]
]
```

### Ingredient API

| Name                         | Description                                          | Prerequisites                                                            | Steps                                                             | Expected Result                                                                                                   |  Success  | Author      | Date          |
|------------------------------|------------------------------------------------------|--------------------------------------------------------------------------|-------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------|:---------:|-------------|---------------|
| test_get<br/>_all_ingredient | Send GET Request to API and receive all Ingredient   | Database and API is running on Docker;<br/> Database migrated and seeded | 1. Sends GET Request to `http://localhost:8881/api/ingredients`   | Length is equal to the length of Ingredients from Database; <br/>Received Ingredient is the first of the Database |  &check;  | Szögi Péter | 2023. 03. 09. |
| test_get<br/>_ingredient     | Send GET Request to API and receive first Ingredient | Database and API is running on Docker;<br/> Database migrated and seeded | 1. Sends GET Request to `http://localhost:8881/api/ingredients/1` | Received Ingredient is the first of the Database                                                                  |  &check;  | Szögi Péter | 2023. 03. 09. |

```{=tex}
\pagebreak
```

### Measure API

| Name                 | Description                                       | Prerequisites                                                            | Steps                                                          | Expected Result                                                                                             |  Success  | Author      | Date          |
|----------------------|---------------------------------------------------|--------------------------------------------------------------------------|----------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------|:---------:|-------------|---------------|
| test_get_all_measure | Send GET Request to API and receive all Measure   | Database and API is running on Docker;<br/> Database migrated and seeded | 1. Sends GET Request to `http://localhost:8881/api/measures`   | Length is equal to the length of Measures from Database; <br/>Received Measure is the first of the Database |  &check;  | Szögi Péter | 2023. 03. 09. |
| test_get_measure     | Send GET Request to API and receive first Measure | Database and API is running on Docker;<br/> Database migrated and seeded | 1. Sends GET Request to `http://localhost:8881/api/measures/1` | Received Measure is the first of the Database                                                               |  &check;  | Szögi Péter | 2023. 03. 09. |

### User API

| Name          | Description                                    | Prerequisites                                                            | Steps                                                       | Expected Result                            |  Success  | Author      | Date          |
|---------------|------------------------------------------------|--------------------------------------------------------------------------|-------------------------------------------------------------|--------------------------------------------|:---------:|-------------|---------------|
| test_get_user | Send GET Request to API and receive first User | Database and API is running on Docker;<br/> Database migrated and seeded | 1. Sends GET Request to `http://localhost:8881/api/users/1` | Received User is the first of the Database |  &check;  | Szögi Péter | 2023. 03. 09. |

```{=tex}
\pagebreak
```

### Auth API

| Name                                              | Description                                                               | Prerequisites                                                                                                    | Steps                                                                                                                                              | Expected Result                                                                                                           |  Success  | Author      | Date          |
|---------------------------------------------------|---------------------------------------------------------------------------|------------------------------------------------------------------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------------------------------------------------|:---------:|-------------|---------------|
| test_login                                        | Send login request                                                        | Database and API is running on Docker;<br/> Database migrated and seeded<br/>At least 1 User exists in Database  | 1. Sends POST Request to `http://localhost:8881/api/login` with `LOGINDATA1` in body                                                               | Response status is `200` and response in `username` path is `gastroworkshop`                                              |  &check;  | Szögi Péter | 2023. 03. 09. |
| test_invalid<br/>_login                           | Send login request with invalid email                                     | Database and API is running on Docker;<br/> Database migrated and seeded                                         | 1. Sends POST Request to `http://localhost:8881/api/login` with `LOGINDATA2` in body                                                               | Response status is `401` and response in `data.message` path is `Unsuccessful login`                                      |  &check;  | Szögi Péter | 2023. 03. 09. |
| test_register                                     | Send register request                                                     | Database and API is running on Docker;<br/> Database migrated and seeded                                         | 1. Sends POST Request to `http://localhost:8881/api/register` with `REGISTERDATA1` in body                                                         | Response status is `201` and response in `data.message` path is `Successful registration!`                                |  &check;  | Szögi Péter | 2023. 03. 09. |
| test_taken<br/>_email_register                    | Send register request with an email already in use                        | Database and API is running on Docker;<br/> Database migrated and seeded                                         | 1. Sends POST Request to `http://localhost:8881/api/register`  with `REGISTERDATA2` in body                                                        | Response status is `422` and response in `message` path is `The email has already been taken.`                            |  &check;  | Szögi Péter | 2023. 03. 09. |
| test_taken<br/>_username<br/>_register            | Send register request with a username already in use                      | Database and API is running on Docker;<br/> Database migrated and seeded                                         | 1. Sends POST Request to `http://localhost:8881/api/register` with `REGISTERDATA3` in body                                                         | Response status is `422` and response in `message` path is `The username has already been taken.`                         |  &check;  | Szögi Péter | 2023. 03. 09. |
| test<br/>_mismatching<br/>_password<br/>_register | Send register request with mismatching password and password confirmation | Database and API is running on Docker;<br/> Database migrated and seeded                                         | 1. Sends POST Request to `http://localhost:8881/api/register` with `REGISTERDATA4` in body                                                         | Response status is `422` and response in `message` path is `The password confirmation does not match. (and 1 more error)` |  &check;  | Szögi Péter | 2023. 03. 09. |
| test_get_profile                                  | Send GET Request to API and receive profile details of first User         | Database and API is running on Docker;<br/> Database migrated and seeded <br/>At least 1 User exists in Database | 1. Gets Access token of `gastroworkshop` user <br/> 2. Sends GET Request to `http://localhost:8881/api/profile` with bearer access token in header | Response status is `200` and response in `username` path is `gastroworkshop`                                              |  &check;  | Szögi Péter | 2023. 03. 09. |

#### Used data

##### Login

| Key        | Email                     | Password |
|------------|---------------------------|----------|
| LOGINDATA1 | gastroworkshop@gmail.com  | 1nimda   |
| LOGINDATA2 | gastroworkshop@gmail.com1 | 1nimda   |

##### Register

| Key           | Email                    | Username       | Password | Password confirmation |
|---------------|--------------------------|----------------|----------|-----------------------|
| REGISTERDATA1 | asdf123@gmail.com        | asdf123        | asdf123  | asdf123               |
| REGISTERDATA2 | gastroworkshop@gmail.com | asdf123        | asdf123  | asdf123               |
| REGISTERDATA3 | asdf123@gmail.com        | gastroworkshop | asdf123  | asdf123               |
| REGISTERDATA4 | asdf123@gmail.com        | asdf123        | asdf123  | asdf1234              |

```{=tex}
\pagebreak
```

## Selenium Tests

### Search Select Tests

| Name                                        | Description                                           | Prerequisites                                                                                              | Steps                                                                                                                                                                                                                                                                             | Expected Result                                           |  Success  | Author      | Date          |
|---------------------------------------------|-------------------------------------------------------|------------------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-----------------------------------------------------------|:---------:|-------------|---------------|
| TestSearchSelect<br/>Normal                 | Test Search Select as normal select                   | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running | 1. Maximizes window <br/>2. Goes to `http://localhost:8881` and wait's for loading <br/>3. Clicks the first Search Select and waits for dropdown<br/>4. Clicks the first element                                                                                                  | The selected text of Search Select is `All-purpose flour` |  &check;  | Szögi Péter | 2023. 03. 06. |
| TestSearchSelect<br/>Search                 | Test Search function of Search Select                 | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running | 1. Maximizes window <br/>2. Goes to `http://localhost:8881` and wait's for loading <br/>3. Clicks the first Search Select and waits for dropdown <br/>4. Sends `z` key to Search box <br/>5. Clicks the first element                                                             | The selected text of Search Select is `Frozen peas`       |  &check;  | Szögi Péter | 2023. 03. 06. |
| TestEmptySearchAfter<br/>SelectSearchClosed | Test resetting Search Box after closing Search Select | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running | 1. Maximizes window <br/>2. Goes to `http://localhost:8881` and wait's for loading <br/>3. Clicks the first Search Select and waits for dropdown <br/>4. Sends `z` key to Search box <br/>5. Clicks the Search Select<br/>6. Clicks the Search Select again and wait for dropdown | The text of Search Box is empty                           |  &check;  | Szögi Péter | 2023. 03. 06. |

```{=tex}
\pagebreak
```

### Home Page Tests

| Name                                       | Description                                                   | Prerequisites                                                                                                                                                   | Steps                                                                                                                                                                                                         | Expected Result                                                                                                                                                          |  Success  | Author      | Date          |
|--------------------------------------------|---------------------------------------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------|:---------:|-------------|---------------|
| TestHomePage<br/>Load                      | Test home page loading                                        | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running                                                      | 1. Maximizes window <br/>2. Goes to `http://localhost:8881` and wait's for loading <br/>                                                                                                                      | The title is `Recipes for you`;<br/>The ingredient-box title is `Your ingredients so far`                                                                                |  &check;  | Szögi Péter | 2023. 03. 06. |
| TestAddIngredient<br/>EmptyIngredient      | Test adding ingredient without selecting ingredient           | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded                                | 1. Click the `Add ingredient` button                                                                                                                                                                          | Alert window message: `Ingredient has not been set!`                                                                                                                     |  &check;  | Szögi Péter | 2023. 03. 06. |
| TestAddIngredient<br/>EmptyMeasure         | Test adding ingredient without selecting measure              | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded                                | 1. Click the Ingredient Search Select<br/>2. Select `INGREDIENT1`<br/>3. Click the `Add ingredient` button                                                                                                    | Alert window message: `Measure has not been set!`                                                                                                                        |  &check;  | Szögi Péter | 2023. 03. 06. |
| TestAddIngredient<br/>InvalidMeasure       | Test adding ingredient with invalid measure                   | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded                                | 1. Click the Ingredient Search Select<br/>2. Select `INGREDIENT1`<br/>3. Click the Measure Search Select<br/>4. Select `MEASURE1`<br/>5. Click the `Add ingredient` button                                    | Alert window message: `0 gram is not a valid measure!`                                                                                                                   |  &check;  | Szögi Péter | 2023. 03. 06. |
| TestAddIngredient<br/>Default              | Test adding ingredient                                        | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded                                | 1. Click the Ingredient Search Select<br/>2. Select `INGREDIENT1`<br/>3. Click the Measure Search Select<br/>4. Select `MEASURE1`<br/>5. Type 1 to Quantity Text Box<br/>6. Click the `Add ingredient` button | The first element of Ingredient List is `All-purpose flour - 1 gram(s)`                                                                                                  |  &check;  | Szögi Péter | 2023. 03. 06. |
| TestAddIngredient<br/>ToTaste              | Test adding ingredient with to taste measure                  | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded                                | 1. Click the Ingredient Search Select<br/>2. Select `INGREDIENT1`<br/>3. Click the Measure Search Select<br/>4. Select `MEASURE2`<br/>5. Click the `Add ingredient` button                                    | The first element of Ingredient List is `All-purpose flour - to taste`                                                                                                   |  &check;  | Szögi Péter | 2023. 03. 06. |
| TestDelete<br/>Ingredient                  | Test deleting ingredient                                      | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded <br/>Added `ADDED_INGREDIENT1` | 1. Click the `X` button next to `ADDED_INGREDIENT1`                                                                                                                                                           | The Ingredient List is empty                                                                                                                                             |  &check;  | Szögi Péter | 2023. 03. 06. |
| TestOrderRecipes<br/>OneElement            | Test ordering recipes when adding one ingredient              | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded                                | 1. Add `ADDED_INGREDIENT2`                                                                                                                                                                                    | The first recipe's name in the Recipe Container is `Beef Stroganoff`                                                                                                     |  &check;  | Szögi Péter | 2023. 03. 06. |
| TestOrderRecipes<br/>MultipleElements      | Test ordering recipes when adding two ingredients             | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded                                | 1. Add `ADDED_INGREDIENT2`<br/>2. Add `ADDED_INGREDIENT3`                                                                                                                                                     | The first recipe's name in the Recipe Container is `Beef Stroganoff`;<br/>The second recipe's name in the Recipe Container is `Stuffed Mushrooms`                        |  &check;  | Szögi Péter | 2023. 03. 06. |
| TestReorder<br/>AfterDelete                | Test ordering recipes when deleting ingredient                | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded <br/>Added `ADDED_INGREDIENT1` | 1. Delete `ADDED_INGREDIENT1`                                                                                                                                                                                 | The first recipe's name in the Recipe Container before the delete is `Banana Bread`;<br/>The first recipe's name in the Recipe Container after the delete is `Apple Pie` |  &check;  | Szögi Péter | 2023. 03. 06. |
| TestOrderWith<br/>Matching<br/>Ingredients | Test ordering recipes based on number of matching ingredients | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded                                | 1. Add `ADDED_INGREDIENT1` <br/> 2. Add `ADDED_INGREDIENT4`<br/>                                                                                                                                              | The first recipe's name in the Recipe Container is `Blueberry Pie`;<br/>The second recipe's name in the Recipe Container  is `Banana Bread`                              |  &check;  | Szögi Péter | 2023. 03. 07. |

```{=tex}
\pagebreak
```

### Navbar Tests

| Name                                    | Description                                      | Prerequisites                                                                                                                    | Steps                                                                                                                                               | Expected Result                                                         | Success | Author      | Date          |
|-----------------------------------------|--------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------|---------|-------------|---------------|
| TestFilterRecipes<br/>ByCategory        | Filter recipes when selecting category on navbar | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded | 1. Click the categories dropdown list on navbar<br/> 2. Select `Appetizer` from dropdown                                                            | The first recipe's name in the Recipe Controller is `Baked Brie`        | &check; | Szögi Péter | 2023. 03. 07. |
| TestFilterReset<br/>OnHomepage          | Reset filter when returning to home page         | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded | 1. Click the categories dropdown list on navbar<br/> 2. Select `Appetizer` from dropdown<br/>3. Click the page brand                                | The first recipe's name in the Recipe Controller is `Apple Pie`         | &check; | Szögi Péter | 2023. 03. 07. |
| TestFilterWith<br/>Owned<br/>Ingredient | Filter recipes while ordering with ingredient    | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded | 1. Add `ADDED_INGREDIENT3`<br/>2. Click the categories dropdown list on navbar<br/> 3. Select `Appetizer` from dropdown<br/>4. Click the page brand | The first recipe's name in the Recipe Controller is `Stuffed Mushrooms` | &check; | Szögi Péter | 2023. 03. 07. |

### Used Data

#### Search Select Texts

| Key         | Name              |
|-------------|-------------------|
| INGREDIENT1 | All-purpose flour |
| INGREDIENT2 | Crème fraîche     |
| INGREDIENT3 | Mushroom          |
| INGREDIENT4 | Blueberry         |
| MEASURE1    | gram              |
| MEASURE2    | to taste          |

##### Added Ingredients

| Key               | Ingredient  | Measure  | Quantity |
|-------------------|-------------|----------|----------|
| ADDED_INGREDIENT1 | INGREDIENT1 | MEASURE2 | 0        |
| ADDED_INGREDIENT2 | INGREDIENT2 | MEASURE2 | 0        |
| ADDED_INGREDIENT3 | INGREDIENT3 | MEASURE2 | 0        |
| ADDED_INGREDIENT4 | INGREDIENT4 | MEASURE2 | 0        |

```{=tex}
\pagebreak
```

## Manual Tests

| Name              | Description                                         | Prerequisites                                                                                                                                                                               | Steps                                                                                                                                                                              | Expected Result                                                  | Success | Author      | Date          |
|-------------------|-----------------------------------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|------------------------------------------------------------------|---------|-------------|---------------|
| RecipeDetailsTest | Display details of Recipe when clicking Recipe card | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded                                                            | 1. Click first Recipe in Recipe container (named `Baked Brie`)                                                                                                                     | All information regarding `RECIPE1` is displayed                 | &check; | Szögi Péter | 2023. 03. 02. |
| RecipeCreateTest  | Create new Recipe                                   | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> User logged in                                                              | 1. Navigate to the Profile page<br/> 2. Click `Make new recipe` button <br/> 3. Fill in form with `RECIPE2`<br/> 4. Click the `Create Recipe` button                               | `RECIPE2` is displayed on the profile and home page              | &check; | Szögi Péter | 2023. 03. 09. |
| RecipeEditTest    | Edit existing Recipe                                | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> User logged in <br/> User has at least one Recipe (for instance: `RECIPE2`) | 1. Navigate to the Profile page <br/> 2. Click the edit button under `RECIPE2` card (pen and paper icon)<br/>3. Fill in form with `RECIPE3`<br/> 4. Click the `Edit Recipe` button | `RECIPE2` is now displayed as `RECIPE3` at profile and home page | &check; | Szögi Péter | 2023. 03. 09. |
| RecipeDeleteTest  | Delete existing Recipe                              | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> User logged in <br/> User has at least one Recipe (for instance: `RECIPE3`) | 1. Navigate to the Profile page <br/> 2. Click the delete button under `RECIPE3` card (trashcan)                                                                                   | `RECIPE3` is now missing from profile and home page              | &check; | Szögi Péter | 2023. 03. 09. |

### Used Data

#### Recipes

| Key     | Name       | Publisher      | Steps                             | Category  | Image URL | Servings | Total Time |
|---------|------------|----------------|-----------------------------------|-----------|-----------|----------|------------|
| RECIPE1 | Baked Brie | gastroworkshop | Array with a length of 3          | Appetizer | 5.jpg     | 8        | 15         |
| RECIPE2 | Apple      | *automatic*    | Array with one item: `First step` | Appetizer | 9.jpg     | 1        | 10         |
| RECIPE2 | Pear       | *automatic*    | Array with one item: `First step` | Appetizer | 9.jpg     | 1        | 10         |

#### Ingredients

| Key         | Recipe  | Ingredient        | Measure    | Quantity |
|-------------|---------|-------------------|------------|----------|
| INGREDIENT1 | RECIPE1 | Brie              | gram       | 370      |
| INGREDIENT2 | RECIPE1 | Thyme leaf        | teaspoon   | 0.5      |
| INGREDIENT3 | RECIPE1 | Rosemary leaf     | teaspoon   | 0.5      |
| INGREDIENT4 | RECIPE1 | Honey             | tablespoon | 2        |
| INGREDIENT5 | RECIPE1 | Salt              | to taste   |          |
| INGREDIENT6 | RECIPE2 | All-purpose flour | to taste   |          |