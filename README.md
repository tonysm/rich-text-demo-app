## Rich Text Demo App

This is a demo application using the Rich Text Laravel package.

### Installation

To install it, follow this script:

```bash
cp .env.example .env
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
sail up -d
# So it replaces the .env database credentials.
sail artisan sail:install --with=mysql
sail artisan migrate
sail artisan storage:link
sail npm ci
sail npm run dev
```

After that you should be able to open the app in the browser, create an account and test it out.
