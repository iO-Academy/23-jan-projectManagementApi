# 2023-jan-groundhogProjectManagementApi

## Project Management API

Many companies use online tools to organise their projects. iO Corp have decided that none of the tools available on the market are good enough for the job, so they have asked the Groundhogs to create an in-house tool.

The front-end has already been created. Using PHP OOP and SQL, we have created a backend API. 


## Project Set-up

Clone the repo  
Run `composer install`  
If no global composer install, run `php composer.phar install`

To run tests, from the project root run:  
`./vendor/bin/phpunit tests`


## API documentation

This API only supports GET requests.

### Return all projects

* **URL**

/projects.php

* **Method:**

 `GET`

* **URL Params**

 **Required:**

 There are no required URL params

 **Optional:**

 There are no optional URL params

 **Example:**

 `/projects.php`

* **Success Response:**

 * **Code:** 200 
   **Content:** 

```json
{
"message": "Successfully retrieved projects",
"data": [
  {
    "id": "17",
    "name": "Overhold",
    "client_id": "7",
    "deadline": "30/06/2022",
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
```

* **Error Response:**

 **Code:** 500 SERVER ERROR 
 **Content:** `{"message": "Unexpected error", "data": []}`




### Return a specific project

* **URL**

/project.php

* **Method:**

`GET`

* **URL Params**

 **Required:**

id=[numeric] - The id of the project to return

 **Optional:**

There are no optional URL params

 **Example:**

`/project.php?id=1`

* **Success Response:**

 * **Code: 200**
   **Content:**
   
```json   
{
"message": "Successfully retrieved project",
"data": {
    "id": "17",
    "name": "Overhold",
    "client_id": "7",
    "client_name": "Avamba",
    "client_logo": "http://dummyimage.com/200x200.png/dddddd/000000",
    "users": [
      {
        "id": "1",
        "name": "Lamond Teather",
        "avatar": "https://robohash.org/explicaboautodit.png?size=50x50&set=set1",
        "role": "Geological Engineer"
      },
      {
        "id": "2",
        "name": "Jonas Filippazzo",
        "avatar": "https://robohash.org/explicaboautodit.png?size=50x50&set=set1",
        "role": "Senior Editor"
      }
    ],
    "deadline": "30/06/2022", 
    "overdue": true
  }
}
````

* **Error Response:**

 **Code:** 400 BAD REQUEST
 **Content:** `{"message": "Invalid project ID", "data": []}`

 **Code:** 500 SERVER ERROR
 **Content:** `{"message": "Unexpected error", "data": []}`





## Authors

**Groundhogs January 2023:**
* HadertS 
* nesclark
* Yas-Shen 
* Joperes-ym 
* randallcoding 
* alreuben 
* Steph-ski

**Acknowledgments**

This build is dedicated to charliecog.
