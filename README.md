# Fridge Fusion

## Project Setup
- Clone the repository `git clone https://github.com/szogipeti/fridgefusion.git`
- Run Docker Desktop
- Run `start.sh` shell script [^bignote]
- The rest of the commands should be done inside the container
	- To open it
	
	```bash
	docker compose exec app fish
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
	
	- Open the container
	
	```bash
	docker compose exec app fish
	```
	
	- Install laravel dependencies
	
	```bash
	composer install
	```
	
	- Generate API key
	
	```bash
	php artisan key:generate
	```