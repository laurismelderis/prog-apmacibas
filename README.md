requirements

    composer
    nodejs, npm
    mysql
    php > 8

Setup 
    1.
        create .env file in project directory
        copy content form .env.example and paste it in .env file

        fill all fileds related to database like this : 
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=YOUR_DATABASE
        DB_USERNAME=YOUR_DATABASE_USER
        DB_PASSWORD=YOUR_USER__PASSWORD

        save file

    2. installing dependencies 
        in bash terminal execute 
        $ ./bin/build.sh

Starting development 
    1. run php web server from project folder
        $ php artisan serve
    
    2. compile js files if working with frontend
        $ npm run watch 

Development settings 

1. Click
    windows/linux
        ctrl+shift+p 

    MacOS 
        cmd+shift+p

2. Type in 
    Configure Language Spesific settings

3. php tab size = 4

4. js tab size = 2 


Good practices : 

PHP
    1. varaible names camel case
    2. model querys always should be named with "Query" name inside like example below
        $userQuery = User::query()
    3. when declarating functions space after function name and function name starts with lowercase charecter example below 
        public function myPublicFunction ()
        {

        }
    4. laravel respurce controllers use as much resource controllers possible for and name them related with their model example below 
        UserController 
    5. For bulk actions and other specific cases make action controllers example below 
        UserActionController
    6. Namespaces always group them all framework things in one group all application namespaces in other group and trailing coma in namespaces example below

        use Illuminate\{
            Support\Facades\Auth,
            Http\Request,
        };

        use App\{
            Http\Resources\UserResource,
            Models\User,
        };

    7. trailing comma in arrays and always use readable indent to make array more readable example below

        return [
            'id'   => $this->id,
            'name' => $this->name,
        ]

    8. For migrations name always use laravel convention and all migration should have down function 
        as well as all foreign keys should be constrained

    9  in if statements use spaces to seperate all parts example below
        1. good 
            if (true) {

            }

        2. bad 
            if(true){

            }

    10. all blocks like if statements and functions should be seperated with empty lines on top and under

    11. In routes use model biniding when possible

    12. For api controllers always user resources, resources has to go hand in hand with mdoel name example below
        Model => User
        Resource => UserResource
    
    13. For restricting access to routes use route middleware groups

JS Lauris Will make.


