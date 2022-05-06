<h1>Configuration</h1>

<h3>First step: Install all dependencies via composer :</h3>
  
    composer install
 
<h3>Next step: create a file called .env.local into the project directory, copy the following line and add your own database configuration :</h3>
 
    DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7&charset=utf8mb4"
    # you should change the db_user, db_password, db_name

 <h3>Final step: Execute the following command :</h3>
 
    php bin/console lexik:jwt:generate-keypair //generate private and public keys for signing JWTokens 
    php bin/console doctrine:database:create
    php bin/console make:migration
    php bin/console doctrine:migrations:migrate

<h3>Then run your local server with : </h3>
    
    // if you use symfony cli
    symfony serve -d
    
    // if you want to run it with php command
    php -S localhost:8000 -t public/   


<h1>Manual</h1>

<h2>Authorization and access on the ressources</h2>

<h3>Event:</h3>

    Read Collections/Item => PUBLIC_ACCESS
    Creation, Modification and Deletion => ADMIN

<h3>Client:</h3>

    Read Collections, Registration => PUBLIC_ACCESS
    Read Items => OWNER/ADMIN (Password cannot be read)
    Modification => OWNER (This fields are able for modification: email, roles, telephone, cardNumber)
    Deletion => OWNER/ADMIN

<h2>Authentication and Token</h2>

    <b>api/login_check</b>: The link for getting the token and the refresh token
    <b>api/token/refresh</b>: This link is used to refresh the token. It's reinitialize the token's ttl (You need to post the refresh token value to this path).