# Notification service

Service allows to send notification on different ways eg. SMS, emails, Push notification  

## Implementation details

* The application allows to define several different providers for each channel.

* Used inbox/outbox pattern guarantees that no one of notification will be lost.

* Can enable/disable channel in environment variable `ENABLED_CHANNELS` which default values is
```
ENABLED_CHANNELS='["sms", "email", "push"]'
```

* One provider is configured - Twilio SMS. Requires setting up following environment variables:
```
TWILIO_ACCOUNT_SID=
TWILIO_TOKEN_AUTH=
TWILIO_SENDER_PHONE_NUMBER=
```

* The application is run with build-in cron container

## Development environment

1. If not already done, install `Docker Compose` (v2.10+)
2. Run `docker compose build --pull --no-cache` to build fresh images
3. Run `docker compose up` (the logs will be displayed in the current shell)
4. Open https://localhost in your favorite web browser and accept the auto-generated TLS certificate
5. Run `docker compose down --remove-orphans` to stop the Docker containers.

## To run test
```
./vendor/bin/codecept run
```

## Usage examples

POST https://[our host]/

Header Content-Type: application/json

Body:
```
{
    "type": "example",
    "channels": ["sms"],
    "userIdentifier": "someIdentifier"
}
```

Notification will be sent on a phone number defined in the environment variable
```
TEST_USER_PHONE_NUMBER=
```

## What is missing

* data validation
* logging
* better error handling
