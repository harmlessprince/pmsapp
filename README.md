## Setup
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

#### Dependencies
- [Docker](https://docs.docker.com/desktop/)

#### Getting Started
- Install and setup docker
- Open terminal and run the following commands
  ```
  $ git clone https://github.com/harmlessprince/pmsapp.git
  $ cd pmsapp
  $ cp .env.example .env
   Set your database credentials in the env file
  $ docker-compose build
  $ docker-compose up
  ```
  Open a new terminal
  ```
  $ docker-compose exec pmsapp composer install
  $ docker-compose exec pmsapp npm install
  $ docker-compose exec pmsapp php artisan key:generate
  $ docker-compose exec pmsapp npm run dev
  ```
  If all goes well
- Visit http://localhost:5454/ on your browser to view laravel home
  