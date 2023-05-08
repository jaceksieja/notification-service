#!/bin/sh
set -e

echo "* * * * * cd /srv/app && php bin/console app:create-notification >>/var/log/cron.log 2>&1" >> /var/spool/cron/crontabs/root
echo "* * * * * cd /srv/app && php bin/console app:process-notification >>/var/log/cron.log 2>&1" >> /var/spool/cron/crontabs/root
echo "* * * * * cd /srv/app && php bin/console app:send-notification >>/var/log/cron.log 2>&1" >> /var/spool/cron/crontabs/root

crond -f
