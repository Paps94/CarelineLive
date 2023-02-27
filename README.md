
# Backend Test

CarelineLive Test

## Introduction

Using Laravel, create an inventory management backend for tracking device allocations.

One of our offerings is a ‘Managed Device’ service, whereby we essentially lease a phone & mobile contract to customers. As the customer’s workforce changes, we often have to reallocate phones to a different worker or deactivate them.

I’m not proposing this so that we get some free dev out of you, however it’s a good exercise in structuring your database schema and models. I’ll be looking for appropriate use of database normalisation (CareLineLive is highly normalised), including sensible relationships between entities.

### Entities:

- SIM card
  - [ x ] Linked to mobile contract
  - [ x ] Always unique
  - [ x ] Always belongs to a single network provider (limited number)

- Phone Number
  - [ x ] Unique
  - [ x ] Belongs to network provider that may change

- Device
  - [ x ] Typically a phone, though could be a tablet
  - [ x ] Serial Number & IMEI are unique
  - [ x ] Manufacturer
  - [ x ] Model
  - [ x ] Operating System: Android or iOS
  - [ x ] Belongs to a single user at a time, track history of assignments
  - [ x ] Can be ‘deactivated’

- User
  - [ x ] Can have multiple devices, both active and inactive

## Project Requirements

- [ x ] Solid demonstration of entity relationship principles, and well organise/readable code.
- [ x ] Unit tests
- [ x ] No UI necessary
- [ x ] Bonus points for an API
- [ x ] Quality over quantity - we don’t want to take up one of your evenings, however would like you to spend ~1 hour on it.

## Instructions

After cloning the repository:
- run `php artisan install` to install all the dependencies
- create your .env file
- create your local and testing database and update the in DB_DATABASE and DB_TEST_DATABASE the .env file.
- populate the db using `php artisan run:migrate --seed`

## Testing

When you are ready to test navigate to the api folder (chances say you are already there):
-  run `vendor/bin/phpunit` or `vendor\bin\phpunit` if on Windows

## Your Notes

**START OF NOTES**

Looking at the requirements it looks straight forward. The email did say I should take about 5 minutes to do this.. pretty sure that is a type but if not I 100% failed that. I did have some questions regarding the notes provided above as to the db structure but since it's the weekend and I knew I would not get an answer before Monday I decided to go with what I would do in a real world situation and that is create a version of what I think it's required and when I can get an answer I can do some minor changes instead of postponing development!

 First things first I created a new laravel project using `composer create-project laravel/laravel *appNameHere*`, called it api.
 Due to the fact I am away from my personal PC and currently doing this on my work laptop I did not go through the trouble to upgrate my PHP version (currently using v7.3) in order to have a fresh Laravel 10 application as that would mess with my current work settings! So this Laravel version is 8.33 if not mistaken.

Following that I started my local server and created my database which i called 'carelinelive'
therefore I renamed APP_NAME and DB_DATABASE in .env file

After thinking about the DB structure and relationships I created my models, migrations, factories and seeders by running `php artisan make:model **ModelNameHere** -mfs`.
To test if all is good I then run my migrations using `php artisan migrate`.

Run into 2 issues

-Illuminate\Database\QueryException
    could not find driver

    I solved this by going into my php.ini file and uncommenting the line extension=pdo_mysql

- SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 1000 byte

    A common issue with a fresh Laravel application. I remembered that I have to change something in the config/database.php file but couldn't remember what at the top of my head so after a quick google search i got that fixed too.

I run after that `php artisan migrate:fresh` we successfully created our tables!

It would be a good idea to create some fake data for the sake of testing when running the migrations for your convenience so next I created my different models. So I updated the $fillable array before completing the factories with dummy data with the help of Faker. Then I completed the seeders and made it so we generate 5 records for each table.

Finally with all that done and the database seeder class altered we can run `php artisan migrate:fresh --seed` to re run our migrations and generate our dummy data using the `--seed` option!

With all that set we can move to creating the controller using `php artisan make:controller **ControllerNameHere** --api`. I used the `--api` flag instead of `--resource` since we do not need the edit and create 'view' routes. We only care about index, store, show, update and destroy.

Due to time restrictions I only created an API for the users (using resources) and devices (using Eloquent) endpoint to showcase the different ways of approaching a particular task. I would argue the resource approach is better coding/Laravel standards but that is a debatable topic between developers).I also added form validation to the users endpoint even though it was not requested but it's good standards (did not add it to the device endpoint due to said time limitations but still wanted to show that that is something I took into consideration)

After setting the routes and checking them that they work as anticipated with Postman I decided to take this a step further and change our error handling in case of an invalid API request such as deleting a
user that does not exist. To that we needed to make some changes in the Handler.php class under app/Exceptions and also added some response macros in the AppServiceProvider for a successful and unsuccessful JSON response!

Lastly I created some simple tests to test our user CRUD api functions and database relationship which can be found under `api/test/Unit/...` and to run them simple be on api directory and run `vendor/bin/phpunit` or `vendor\bin\phpunit` if on Windows! Once again I did not create a test for all the different crud files due to the time limitation but of course in a real world example I would test for all but i did try to include all relationships!

I would love some feedback even if the result of this test is negative. A working example or what you would expect to see from a developer would be phenomenal as it's the only way for me to know what I did wrong and improve as a developer!

**END OF NOTES**

## Submitting Your Test

To submit your test, please:

1. Setup a GitHub repository and push your code.
