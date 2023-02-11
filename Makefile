export DOCKER_EXEC_COMMAND=docker exec -it rekrutacja2-php-1
export DOCKER_CONSOLE_COMMAND=${DOCKER_EXEC_COMMAND} php bin/console

docker-restart:
	docker compose down && docker compose up -d

bash:
	${DOCKER_EXEC_COMMAND} bash

entity:
	${DOCKER_CONSOLE_COMMAND} make:entity

migrations-generate:
	${DOCKER_CONSOLE_COMMAND} make:migration

migrations-apply:
	${DOCKER_CONSOLE_COMMAND} doctrine:migrations:migrate --no-interaction

test:
	${DOCKER_CONSOLE_COMMAND} doctrine:database:drop --force --env=test
	${DOCKER_CONSOLE_COMMAND} doctrine:database:create --env=test
	${DOCKER_CONSOLE_COMMAND} doctrine:migrations:migrate --no-interaction --env=test
	${DOCKER_EXEC_COMMAND} php vendor/bin/phpunit


