# Movie Rental System

🎬 A CRUD application using PHP and PDO to manage a list of movies in a rental store.

## Features
- Add new movies
- View movie list
- Update availability
- Delete movies

## Database
- Name: `video_store`
- Table: `movies`
  - `id` INT PRIMARY KEY AUTO_INCREMENT
  - `title` VARCHAR
  - `director` VARCHAR
  - `release_year` YEAR
  - `available` BOOLEAN
