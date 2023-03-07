# Fridge Fusion - Test Documentation

## API Tests

| Name                | Description                                           | Prerequisites                                                            | Steps                                                                                                                                                                                                    | Expected Result                                                                      | Success | Author      | Date          |
|---------------------|-------------------------------------------------------|--------------------------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------|---------|-------------|---------------|
| test_get_all_recipe | Send GET Request to API and receive all Recipes       | Database and API is running on Docker;<br/> Database migrated and seeded | 1. Sends GET Request to `http://localhost:8881/api/recipes` 2. Checks if response data is expected length, and first element matches                                                                     | Length is 40; <br/>Received Recipe is the first of the Database                      | - [x]   | Szögi Péter | 2023. 03. 02. |
| test_get_recipe     | Send GET Request to API and receive first Recipe      | Database and API is running on Docker;<br/> Database migrated and seeded | 1. Sends GET Request to `http://localhost:8881/api/recipes/1` 2. Checks if response data matches element in Database                                                                                     | Received Recipe is the first of the Database                                         | - [x]   | Szögi Péter | 2023. 03. 02. |
| test_create_recipe  | Send POST Request to API and create Recipe            | Database and API is running on Docker;<br/> Database migrated and seeded | 1. Creates `RECIPE1` <br/>2. Sends POST Request to `http://localhost:8881/api/recipes` with `RECIPE1` in body <br/>3. Checks for response status and message<br/>4. Checks Database for created RECIPE1  | Response status is 201; <br/> `RECIPE1` has been created in Database                 | - [x]   | Szögi Péter | 2023. 03. 02. |
| test_update_recipe  | Send PUT Request to API and update selected Recipe    | Database and API is running on Docker;<br/> Database migrated and seeded | 1. Creates `RECIPE1` <br/>2. Sends Put Request to `http://localhost:8881/api/recipes/1` with `RECIPE1` in body <br/>3. Checks for response status and message<br/>4. Checks Database for updated RECIPE1 | Response status is 200; <br/> First Recipe has been updated to `RECIPE1` in Database | - [x]   | Szögi Péter | 2023. 03. 02. |
| test_delete_recipe  | Send Delete Request to API and delete selected Recipe | Database and API is running on Docker;<br/> Database migrated and seeded | 1. Finds selected Recipe <br/>2. Sends DELETE Request to `http://localhost:8881/api/recipes/1` <br/>3. Checks response status <br/>4. Check's if first recipe is missing                                 | Response status is 200; <br/> First Recipe is missing in Database                    | - [x]   | Szögi Péter | 2023. 03. 02. |

### RECIPE1
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
"publisher" => "Gastroworkshop",
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

## Selenium Tests

### Search Select Tests

| Name                                   | Description                                           | Prerequisites                                                                                              | Steps                                                                                                                                                                                                                                                                             | Expected Result                                           | Success | Author      | Date          |
|----------------------------------------|-------------------------------------------------------|------------------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-----------------------------------------------------------|---------|-------------|---------------|
| TestSearchSelectNormal                 | Test Search Select as normal select                   | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running | 1. Maximizes window <br/>2. Goes to `http://localhost:8881` and wait's for loading <br/>3. Clicks the first Search Select and waits for dropdown<br/>4. Clicks the first element                                                                                                  | The selected text of Search Select is `All-purpose flour` | - [x]   | Szögi Péter | 2023. 03. 06. |
| TestSearchSelectSearch                 | Test Search function of Search Select                 | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running | 1. Maximizes window <br/>2. Goes to `http://localhost:8881` and wait's for loading <br/>3. Clicks the first Search Select and waits for dropdown <br/>4. Sends `z` key to Search box <br/>4. Clicks the first element                                                             | The selected text of Search Select is `Frozen peas`       | - [x]   | Szögi Péter | 2023. 03. 06. |
| TestEmptySearchAfterSelectSearchClosed | Test resetting Search Box after closing Search Select | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running | 1. Maximizes window <br/>2. Goes to `http://localhost:8881` and wait's for loading <br/>3. Clicks the first Search Select and waits for dropdown <br/>4. Sends `z` key to Search box <br/>4. Clicks the Search Select<br/>5. Clicks the Search Select again and wait for dropdown | The text of Search Box is empty                           | - [x]   | Szögi Péter | 2023. 03. 06. |

### Home Page Tests

| Name                             | Description                                         | Prerequisites                                                                                                                                                 | Steps                                                                                                                                                                                                         | Expected Result                                                                                                                                                          | Success | Author      | Date          |
|----------------------------------|-----------------------------------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---------|-------------|---------------|
| TestHomePageLoad                 | Test home page loading                              | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running                                                    | 1. Maximizes window <br/>2. Goes to `http://localhost:8881` and wait's for loading <br/>                                                                                                                      | The title is `Recipes for you`;<br/>The ingredient-box title is `Your ingredients so far`                                                                                | - [x]   | Szögi Péter | 2023. 03. 06. |
| TestAddIngredientEmptyIngredient | Test adding ingredient without selecting ingredient | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded                              | 1. Click the `Add ingredient` button                                                                                                                                                                          | Alert window message: `Ingredient has not been set!`                                                                                                                     | - [x]   | Szögi Péter | 2023. 03. 06. |
| TestAddIngredientEmptyMeasure    | Test adding ingredient without selecting measure    | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded                              | 1. Click the Ingredient Search Select<br/>2. Select `INGREDIENT1`<br/>3. Click the `Add ingredient` button                                                                                                    | Alert window message: `Measure has not been set!`                                                                                                                        | - [x]   | Szögi Péter | 2023. 03. 06. |
| TestAddIngredientInvalidMeasure  | Test adding ingredient with invalid measure         | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded                              | 1. Click the Ingredient Search Select<br/>2. Select `INGREDIENT1`<br/>5. Click the Measure Search Select<br/>6. Select `MEASURE1`<br/>7. Click the `Add ingredient` button                                    | Alert window message: `0 gram is not a valid measure!`                                                                                                                   | - [x]   | Szögi Péter | 2023. 03. 06. |
| TestAddIngredientInvalidDefault  | Test adding ingredient with invalid measure         | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded                              | 1. Click the Ingredient Search Select<br/>2. Select `INGREDIENT1`<br/>5. Click the Measure Search Select<br/>6. Select `MEASURE1`<br/>7. Type 1 to Quantity Text Box<br/>8. Click the `Add ingredient` button | The first element of Ingredient List is `All-purpose flour - 1 gram(s)`                                                                                                  | - [x]   | Szögi Péter | 2023. 03. 06. |
| TestAddIngredientToTaste         | Test adding ingredient with to taste measure        | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded                              | 1. Click the Ingredient Search Select<br/>2. Select `INGREDIENT1`<br/>5. Click the Measure Search Select<br/>6. Select `MEASURE2`<br/>7. Click the `Add ingredient` button                                    | The first element of Ingredient List is `All-purpose flour - to taste`                                                                                                   | - [x]   | Szögi Péter | 2023. 03. 06. |
| TestDeleteIngredient             | Test deleting ingredient                            | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded <br/>Added ADDED_INGREDIENT1 | 1. Click the `X` button next to `ADDED_INGREDIENT1`                                                                                                                                                           | The Ingredient List is empty                                                                                                                                             | - [x]   | Szögi Péter | 2023. 03. 06. |
| TestOrderRecipesOneElement       | Test ordering recipes when adding one ingredient    | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded                              | 1. Add ADDED_INGREDIENT2                                                                                                                                                                                      | The first recipe's name in the Recipe Container is `Beef Stroganoff`                                                                                                     | - [x]   | Szögi Péter | 2023. 03. 06. |
| TestOrderRecipesMultipleElements | Test ordering recipes when adding two ingredients   | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded                              | 1. Add ADDED_INGREDIENT2<br/>2. Add ADDED_INGREDIENT3                                                                                                                                                         | The first recipe's name in the Recipe Container is `Beef Stroganoff`;<br/>The second recipe's name in the Recipe Container is `Stuffed Mushrooms`                        | - [x]   | Szögi Péter | 2023. 03. 06. |
| TestReorderAfterDelete           | Test ordering recipes when deleting ingredient      | Database and API is running on Docker;<br/> Database migrated and seeded;<br/> Vite live server is running<br/> Home page loaded <br/>Added ADDED_INGREDIENT1 | 1. Delete ADDED_INGREDIENT1                                                                                                                                                                                   | The first recipe's name in the Recipe Container before the delete is `Banana Bread`;<br/>The first recipe's name in the Recipe Container after the delete is `Apple Pie` | - [x]   | Szögi Péter | 2023. 03. 06. |


#### Used Data

##### Search Select Texts

| Key         | Name              |
|-------------|-------------------|
| INGREDIENT1 | All-purpose flour |
| INGREDIENT2 | Crème fraîche     |
| INGREDIENT3 | Mushroom          |
| MEASURE1    | gram              |
| MEASURE2    | to taste          |

##### Added Ingredients

| Key               | Ingredient  | Measure  | Quantity |
|-------------------|-------------|----------|----------|
| ADDED_INGREDIENT1 | INGREDIENT1 | MEASURE2 | 0        |
| ADDED_INGREDIENT2 | INGREDIENT2 | MEASURE2 | 0        |
| ADDED_INGREDIENT3 | INGREDIENT3 | MEASURE2 | 0        |