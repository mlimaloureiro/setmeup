SetMeUp -- Social Registration Aggregator
===========================================

##  DESCRIPTION

This project aims to be a unique form where you can register to all social networks in only one place. Since social networks don't provide API's to do that, we need to automate the process with, for instance, Selenium.

The project is web based and has a Laravel front controller that interacts with Selenium server to automate the registration with the input submitted.

It's still very buggy since it was made in a Hackaton but the concept is proven. Feel free to contribute!

##  Credits for the Idea

Andrea Martins

##  What's done

FacebookHandler and TwitterHandler, it's already registering in these social networks and adding a profile picute and cover photo.

## TODO

Check and add to issues list

##  GETTING STARTED

*   All you need as the server for this client is the selenium-server-standalone-#.jar file provided here:  http://code.google.com/p/selenium/downloads/list and PHP 5.4+ installed.

*   Download and run that file, replacing # with the current server version.

        java -jar selenium-server-standalone-#.jar
        
*   Go to {projectRoot}/setmeup and start the development server.

        php artisan serve

*   Open the browser -> http://localhost:8000.

## CONTRIBUTING

I'd love to continue SetMeUp and to use your help to make it better. Feel free to 

*   open an [issue](https://github.com/mlimaloureiro/setmeup/issues) if you run into any problem. 
*   fork the project and submit [pull request](https://github.com/mlimaloureiro/setmeup/pulls). 
