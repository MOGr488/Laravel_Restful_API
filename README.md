# Laravel Restful API
There is two branches
- [Main Branch](https://github.com/MOGr488/Laravel_Restful_API/tree/master): includes basic API functions.
- [Passport Branch](https://github.com/MOGr488/Laravel_Restful_API/tree/passport): adds API security using Passport.

## Project description
In this project I learnt how to provide a RESTful API with a wide range of functionalities, including route setup, data handling, error handling, and user authentication and authorization. It utilizes Resource Controllers to improve API routes and provides data pagination for handling large amounts of data. The API also supports task scheduling and event handling.
- RESTful API interface
- API route setup
- Controlling API route versions
- API route setup for related data
- Improved API routes with Resource Controllers
- Handling errors
- Filtering and sorting data
- User authentication and authorization
- Authentication using the OAuth2 protocol and Passport package
- Controlling user permissions and authorizations
- Data pagination
- Task scheduling
- Events


# Table of Contents
- [Laravel Restful API](#laravel-restful-api)
  - [Project description](#project-description)
  - [Installation](#installation)
- [Routes](#routes)
  - [User Routes](#user-routes)
  - [Lesson Routes](#lesson-routes)
  - [Tag Routes](#tag-routes)
  - [Relationship Route](#relationship-route)



1. Introduction
- Main Branch vs Passport Branch
Project Description
Installation
Prerequisites
Clone the Repository
Set Environment Variables
Run Database Migrations
Start the Development Server
Testing the APIs
Routes
User Routes
Lesson Routes
Tag Routes
Relationship Routes






## Installation
Prerequisites
- PHP 8.0-8.2
- MySQL
- Composer
- Laragon or XAMP 
- Postman

Step 1: Clone the repository

Clone the repository to your local machine using Git:

`git clone https://github.com/MOGr488/Laravel_Restful_API.git`

Step 2

Copy the .env.example file and rename it to .env. Then, set the necessary environment variables, such as database connection details, app key.

`cp .env.example .env`

Generate a new app key using the following command:

`php artisan key:generate`


 
Step 3: Run Database Migrations
Run the following command to create the necessary tables in your database:

`php artisan migrate`


Step 4: Start the Development Server
Run the following command to start the development server:

`php artisan serve`


Step 5: Testing the APIs

Open your browser and go to `http://localhost:8000`. You should see the Laravel welcome page.
To test the APIs, you can use a tool like Postman or any other REST client.
That's it! You now have the Laravel Rest API with Passport project up and running on your local machine.

![image](https://user-images.githubusercontent.com/86527969/230791998-f15b8e27-5f17-43df-a43c-b6c0537461af.png)




# Routes 

### User Routes:

- `GET /api/v1/users`: get all users
- `POST /api/v1/users`: create a new user
- `GET /api/v1/users/{user}`: get a specific user by ID
- `PUT/PATCH /api/v1/users/{user}`: update a specific user by ID
- `DELETE /api/v1/users/{user}`: delete a specific user by ID
- `GET /api/v1/users/{id}/lessons`: get all lessons of a specific user by user ID

### Lesson Routes:

- `GET /api/v1/lessons`: get all lessons
- `POST /api/v1/lessons`: create a new lesson
- `GET /api/v1/lessons/{lesson}`: get a specific lesson by ID
- `PUT/PATCH /api/v1/lessons/{lesson}`: update a specific lesson by ID
- `DELETE /api/v1/lessons/{lesson}`: delete a specific lesson by ID
- `GET /api/v1/lessons/{id}/tags`: get all tags of a specific lesson by lesson ID

### Tag Routes:

- `GET /api/v1/tags`: get all tags
- `POST /api/v1/tags`: create a new tag
- `GET /api/v1/tags/{tag}`: get a specific tag by ID
- `PUT/PATCH /api/v1/tags/{tag}`: update a specific tag by ID
- `DELETE /api/v1/tags/{tag}`: delete a specific tag by ID
- `GET /api/v1/tags/{id}/lessons`: get all lessons of a specific tag by tag ID


### Relationship Route 

`GET|HEAD api/v1/lessons/{id}/tags`:

This route is used to fetch all the tags associated with a specific lesson.
The {id} parameter is the ID of the lesson whose tags are to be fetched.

`GET|HEAD api/v1/tags/{id}/lessons`:

This route is used to fetch all the lessons associated with a specific tag.
The {id} parameter is the ID of the tag whose lessons are to be fetched.

`GET|HEAD api/v1/users/{id}/lessons`:

This route is used to fetch all the lessons associated with a specific user.
The {id} parameter is the ID of the user whose lessons are to be fetched.


Note : This project was done using Hsoub course (They use the old laravel 5.5) and my personal research. 
