up:
	docker-compose up -d

up_rebuild:
	docker-compose up -d --build

down:
	docker-compose down

ssh:
	docker-compose exec php bash
