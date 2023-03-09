# Fridge Fusion

Why choose us?

Fridge Fusion helps users find delicious recipes by using ingredients they already have at home. With our website you
can note down your ingredients you have too much of, or just want to cook with and get the recipes you like. This makes
cooking easy and convenient, and helps reduce food waste, by using up ingredients before they expire. FridgeFusion is
the perfect solution for people who want to cook healthy and tasty meals without having to run to the store
every time they need a new ingredient.

## Project Setup

- Clone the repository `git clone https://github.com/szogipeti/fridgefusion.git`
- Run Docker Desktop
- Run `start.sh` shell script [^bignote]
- The rest of the commands should be done inside the container
    - To open it

  ```bash
  docker compose exec app fish
  ```

- Generate API key

  ```bash
  php artisan key:generate
  ``` 

- Run the migration and seeder files

```bash
php artisan migrate --seed
```

*If you want to re-run it*

```bash
php artisan migrate:fresh --seed
```

- Create link for images

```bash
php artisan storage:link
```

- Install Vue project dependencies

```bash
npm install
```

- Run vite live server

```˛bash
npm run dev
```

[^bignote]: *If the script would fail, the Project Setup can be done manually*

	- Copy the `.env.example` file as `.env`
	
	**Windows - CMD**
	
	```bat
	copy .env.example .env
	```
	
	**Windows - Power Shell**
	
	```powershell
	Copy-Item .env.example .env
	```
	
	**Mac and Linux - bash, zsh, fish**
	
	```bash
	cp .env.example .env
	```
	
	- Build the Dockerfile first time installing, and after every change in the Dockerfile
	
	```bash
	docker compose build
	```
	
	- Run the container with the `docker compose up` command
		- Default file: `docker-commpose.yml`
		- Dev file: `docker-compose.dev.yml`
		- Full project file (for presentations): `docker-compose.prod.yml`
		- If the user entitlement is incorrectly set: `docker-compose.user.yml`

	*Example: `docker-compose -f docker-compose.yml -f docker-compose.dev.yml up -d`*
	
	- Open the container
	
	```bash
	docker compose exec app fish
	```
	
	- Install laravel dependencies
	
	```bash
	composer install
	```

```{=tex}
\pagebreak
```

## Features

### Showing Recipes

On the home page you can select any recipe you like, and check out how to make it. To see a recipe's details simply
click on the card of recipe. When the page of the recipe is loaded you can see the ingredients and the method of making
the recipe. Other information is also displayed such as the type of the food, the time it would take to make in minutes,
the number of servings the recipe is made for, and not forget the creator of the recipe. You can also see an image that
will help you decide if you should make this recipe.

### Filtering Recipes

With enough recipes in a very short amount of time it can get hard to find what you are looking for. Fridge Fusion helps
you out in this area too. In the navigation bar you can filter the recipes by category. For example, if you want to make
a dessert you select the Dessert from the categories and see all the different kind of desserts you can make.

### Sorting Recipes based on your ingredients

Do you ever feel that you don't know what to cook? With Fridge Fusion's sorting algorithm this will never be a problem.
On the home page you can note what kind of ingredients you have at home and how many of them. But don't worry, when you
select the ingredients you can only select measures which are valid for that ingredient (no slices of orange juices).
Each time you add an ingredient the displayed recipes can change in order, depending on how much of the ingredients the
recipe contains. Moreover, the amount of the given ingredients can also change the order of recipes. This way you can "
get rid of" any ingredient you have too much at home. If you change your mind you can also delete any ingredient and the
recipes will refresh.

### Creating, editing and deleting your recipes

If you feel like you have an incredible recipe in mind, you can share it with others. If you create an account you can
create, edit and delete your recipes. Just head to the profile page, and you will find everything. If you want to create
a new recipe just click on the "Make new recipe" button, and fill out the form. After you are done, click on the "Create
Recipe" button. On the profile page you can see all of your recipes. If you want to edit one, click on the pen and paper
icon and fill make the changes you want. If you want to delete one of your recipe just click on the trashcan icon. All
changes made are going to affect the recipes in your profile and on the home page.

If you want to check out our social media pages, you can find it in the footer. Have fun cooking with us.