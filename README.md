## OO Project Set-up

Clone the repo  
Run `composer install`  
If no global composer install, run `php composer.phar install`

To run tests, from the project root run:  
`vendor/bin/phpunit tests`


## API documentation

This API only supports GET requests.

Return all projects, optionally filtered by client

URL

/projects.php

Method:

GET

URL Params

Required:

There are no required URL params

Optional:

client=[numeric] - The id of a client to return projects for, if not provided, all projects are returned

locale=[uk|us] - Adjusts the format of the returned data to match the users location, default to uk

Example:

/projects.php?client=1&locale=uk

Success Response:

Code: 200 
Content: 
{
"message": "Successfully retrieved projects",
"data": [
  {
    "id": "17",
    "name": "Overhold",
    "client_id": "7",
    "deadline": "30/06/2022", // "06-30-2022" if locale=us
    "overdue": true
  },
  {
    "id": "18",
    "name": "Wrapsafe",
    "client_id": "18",
    "deadline": "28/03/2024",
    "overdue": false
  }
]
}
Error Response:


Code: 500 SERVER ERROR 
Content: {"message": "Unexpected error", "data": []}
