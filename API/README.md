<h1>Configuration</h1>

<h3>First step: Install all dependencies via composer :</h3>
  
    composer install
 
<h3>Next step: create a file called .env.local in the project directory, copy the following line and add your own database configuration :</h3>
 
    DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7&charset=utf8mb4"
    MAILER_DSN=gmail+smtp://EMAIL:PASSWORD@default
    MESSENGER_TRANSPORT_DSN=doctrine://default
    # you should change the db_user, db_password, db_name, EMAIL, PASSWORD

 <h3>Final step: Execute the following command :</h3>
 
    php bin/console lexik:jwt:generate-keypair // generate private and public keys for signing JWTokens 
    php bin/console doctrine:database:create
    php bin/console make:migration
    php bin/console doctrine:migrations:migrate
    php bin/console create:super-admin      // You should create your own super admin 
    php bin/console messenger:consume -vv      // launch the messenger service

<h3>Then run your local server with : </h3>
    
    // if you use symfony cli
    symfony serve -d
    
    // if you want to run it with php command
    php -S localhost:8000 -t public/   


<h1>Manual</h1>

### Event:

    Read Collections/Item => PUBLIC_ACCESS
    Creation, Modification and Deletion => ADMIN

### Client:

    Read Collections, Registration => PUBLIC_ACCESS
    Read Items => OWNER/ADMIN (Password cannot be read)
    Modification => OWNER (This fields are able for modification: email, roles, telephone, cardNumber)
    Deletion => OWNER/ADMIN

### Reservation:
    Read Collections => ADMIN
    Booking place => USER

    NB: There is no deletion and modification paths.

### Payment:

    api/reservation/{id}/payment => You can access it with the post method and you should send an empty JSON. It will return the link for the payment with Stripe.

    while the payment is successful, the API will send the ticket through your email.

### Authentication and Token:

    api/login_check: The link for getting the token and the refresh token
    api/token/refresh: This link is used to refresh the token. It's reinitialize the token's ttl (You need to post the refresh token value to this path).

### Important points:

<ul>
    <li>The token is stored in the cookie. You can access it through the "Token" keyword</li>
    <li>All entry points can be seen on the API docs.</li>
    <li>Ensure that all dependencies are installed correctly.</li>
    <li>All configurations are required for the API's functionality so don't forget any steps above.</li>
<ul>