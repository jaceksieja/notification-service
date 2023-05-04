#!/bin/sh
set -e

attempt_left=20

until php bin/console doctrine:query:sql "select 1" >/dev/null 2>&1;
do
    attempt_left=$((attempt_left-1))

    if [ "${attempt_left}" -eq "0" ]; then

        (>&2 echo "Database did not answer. Aborting migrations.")
        exit 1
    else
        (>&2 echo "Waiting for Database to be ready...")
    fi

    sleep 1
done

php bin/console doctrine:migrations:migrate --no-interaction

if [ "$APP_ENV" = "dev" ]; then
	php bin/console doctrine:database:create --env=test
	php bin/console doctrine:migrations:migrate --no-interaction --env=test
fi
