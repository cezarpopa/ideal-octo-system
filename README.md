### Acme App

Prerequisites:
```
PHP 8.0.1  
Symfony CLI
Composer
Yarn 
Docker  
Docker Compose
Node
```

Optional
```vue-cli```

### Starting the project

```yarn start``` - this command will start the symfony https server and boot up the docker mysql instance

### Installing the dependencies
```yarn install:deps``` - this command will install all the required project dependencies**

### Creating the database schema
```yarn migrate``` - this command will run the migrations on the current database

### Add fake data
```yarn load:fixtures``` - this command will import the faker/foundry data into the project

### Compile the frontend assets

``` yarn build:prod ``` or ``` yarn build:watch ``` - self-explanatory

### Todo
Enable frontend testing
