.DEFAULT_GOAL := help

serve: ## Run Server
	./vendor/bin/sail up

migrate: ## Run migrate
	docker-compose run --rm php php artisan migrate

tinker: ## Run tinker
	docker-compose run --rm php php artisan tinker

composer: ## Entry for Composer command
	docker-compose run --rm php composer install

db-log: ## Tail mariadb log
	docker-compose exec db tail -f /var/lib/mysql/logs/general.log

seeder: ## Run db seed
	docker-compose run --rm php php artisan db:seed
	docker-compose run --rm php php artisan db:seed --class=MakeUsersSeeder
	# docker-compose run --rm php php artisan db:seed --class=UserTallyMakeSeeder
	docker-compose run --rm php php artisan db:seed --class=UpdateAllUsersMailAlerts
	docker-compose run --rm php php artisan db:seed --class=DemoFullDataSeeder

phpstan:
	docker-compose run --rm php ./vendor/bin/phpstan analyse

graphql-schema: ## Print schema.graphql
	docker-compose run --rm php php artisan lighthouse:print-schema > graphql/schema.graphql

.PHONY: help
help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'
