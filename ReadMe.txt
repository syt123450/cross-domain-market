About how to use the site:
 -  index.php file is used to load properties and start the session.
 -  All html (static) pages should be placed in /templates
        * You can alternate the routes, including the default route, from /src/utils/routes.php
 -  All php (dynamic) pages should be placed in /src/*
 -  In /src/utils/settings.php, there's a mock varialbe,
        * when 'mock' => true, it's using MOCK mode. You can find and implement mock functions in /src/mock/*;
        * when 'mock' => false, it's using NORMAL mode. You can find and implement normal functions in /src/* (other than mock)
