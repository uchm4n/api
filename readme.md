## Api
General purpose public API

## Demo
---- 
- API http://api.expertj.com

## Documentation
----
api contains several packages:
- dingo api
- jwt-auth
- laravel-cors
- entrust

## Usage 
---
To use api you need to have a user name to generate token.
---
- First you must register a user. To register a user
 send post request to this end point with following data 
 **Endpoint:** `api/register`
 ```
    {
        "name": "Your Name",
        "email" : "info@example.com",
        "password" : "password",
        "phone" : "555000730",
        "bio" : "About yourself (optional)",
        "image" : "http://lorempixel.com/128/128/",        
    }
 ```
 - After registering a username, authorize with your credentials  
 **Endpoint:** `api/auth`
  ```
     {
         "email" : "info@example.com",
         "password" : "password",
     }
  ```
 > This action will give you a token which will be used to access other endpoints.
 > You should pass **Authorization** header with **Bearer eyJ0eXAiOiJKV1Q...**
 
---

####Available endpoints are 
 
  Method         | Endpoint                |  Access
  -------------  | -------------           |  -----
  GET            | /api/locale/{lang}      |   All   
  POST           | /api/auth               |   All
  POST           | /api/register           |   All
  GET            | /api/user               |   User
  GET            | /api/token              |   User
  GET            | /api/users              |   User
  GET            | /api/task               |   Admin
  GET            | /api/task/{id}          |   Admin
  POST           | /api/task/store         |   Admin
  PUT            | /api/task/update/{id}   |   Admin
  DELETE         | /api/task/delete/{id}   |   Admin

---