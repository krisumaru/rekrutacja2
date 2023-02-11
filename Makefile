docker-restart:
	docker compose down && docker compose up -d

bash:
	docker exec -it rekrutacja2-php-1 /bin/bash

