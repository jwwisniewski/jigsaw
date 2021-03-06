p ?=

ci:
	docker-compose exec phpfpm composer install

crq:
	docker-compose exec phpfpm composer require $(p)

cu:
	docker-compose exec phpfpm composer update $(p)

crm:
	docker-compose exec phpfpm composer remove $(p)

cda:
	docker-compose exec phpfpm composer dump-autoload

up:
	docker-compose up -d --remove-orphans

down:
	docker-compose down --remove-orphans || \
	docker-compose down --remove-orphans

console:
	docker-compose up -d --remove-orphans && docker-compose exec phpfpm bash
