default: help
include .env

run: ## Start Project
	@make composer-install && \
	make npm-install && \
	clear && \
	make db && \
	clear && \
	make reload-storage-link && \
	npm run build && \
	clear && \
	make work

work: ## Launch server and start working
	make open-browser && \
	make start-server

start-server: ## Launch php server
	@php -S localhost:8005 --docroot=public

composer-install: ## Install composer dependencies
	@composer install --no-interaction

npm-install: ## Install npm packages
	@npm install

reload-storage-link: ## delete and create storage:link
	@php artisan storage:unlink && \
    php artisan storage:link

db-create: ## Create database if it doesn't exist
	@dotenv -e .env -- mysql -u $(DB_USERNAME) -p"$(DB_PASSWORD)" -h $(DB_HOST) -P $(DB_PORT) < create-database.sql

db: ## Reload database and fixtures
	@make db-create && \
	make db-wipe && \
	make db-migrate && \
	make db-seed

db-wipe: #Recreate database
	@php artisan db:wipe

db-migrate: ## Migrate current db state
	@php artisan migrate

db-seed: ## Load fixtures
	@php artisan db:seed

open-browser: ## Open project in default browser
	@xdg-open http://localhost:8005

hrm: ## Run Hot Reload Module
	@npm run dev

help: ## Show this help menu
	@awk -F ':|##' '/^[^\t].+?:.*?##/ {printf "\033[36m%-30s\033[0m %s\n", $$1, $$NF}' $(MAKEFILE_LIST)
