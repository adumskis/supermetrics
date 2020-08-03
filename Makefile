up:
	docker-compose up -d

up_rebuild:
	docker-compose up -d --build

down:
	docker-compose down

composer_install:
	docker-compose exec php composer install --verbose --optimize-autoloader

migrate:
	docker-compose exec php php console/migrate

fetch_posts:
	docker-compose exec php php console/fetch-posts

ssh:
	docker-compose exec php bash
