#!/bin/bash

remove_and_run() {
  trap 'exit 1' INT TERM EXIT
  docker rm -f app-ftmedic
  docker rm -f database-ftmedic
  docker rmi ftmedic-app
  docker system prune -f
  docker-compose up -d || exit 1

  echo -e "\nCreating session table..."
  sleep 5
  docker exec -it app-ftmedic php artisan session:table

  echo "Running optimize..."
  sleep 5
  docker exec -it app-ftmedic php artisan optimize

  echo "Running migrate..."
  sleep 5
  docker exec -it app-ftmedic php artisan migrate --force

  echo "Running seed..."
  sleep 5
  docker exec -it app-ftmedic php artisan db:seed --force
}

if command -v docker-compose >/dev/null 2>&1; then
    echo "docker-compose is available"
    remove_and_run
else
    echo "docker-compose is not available"
    exit 1
fi
