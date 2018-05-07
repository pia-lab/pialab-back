#!/usr/bin/env bash
set -e

# TODO share this between script (in an include)
if [ -f .env ]
then
    source .env
else
    echo "Please run this script from project root, and check .env file as it is mandatory"
    echo "If it is missing a quick solution is :"
    echo "ln -s .env.dist .env"
    exit 42
fi

bin/console doctrine:database:create --connection=default --if-not-exists --no-interaction 
bin/console doctrine:database:create --connection=customer --if-not-exists --no-interaction 

bin/console doctrine:schema:update --force --no-interaction 
