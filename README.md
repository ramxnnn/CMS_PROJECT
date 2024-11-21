# Video Games Database

This project manages a database of video games, utilizing two tables: `games` and `gameDetails`. The `games` table stores general information about the games, while the `gameDetails` table holds additional details for each game.

## Table Structure

### 1. `games` Table
The `games` table contains essential details about each game.

| Column         | Data Type     | Description                               |
|----------------|---------------|-------------------------------------------|
| `game_id`      | INT           | Unique identifier for the game (Primary Key) |
| `name`         | VARCHAR(255)  | Name of the game                         |
| `genre`        | VARCHAR(100)  | Genre of the game (e.g., RPG, Action)     |
| `release_date` | DATE          | The release date of the game (YYYY-MM-DD) |
| `platform`     | VARCHAR(255)  | Platforms the game is available on       |

### 2. `gameDetails` Table
The `gameDetails` table stores more in-depth information for each game.

| Column         | Data Type     | Description                                   |
|----------------|---------------|-----------------------------------------------|
| `detail_id`    | INT           | Unique identifier for the detail (Primary Key) |
| `game_id`      | INT           | Foreign Key referencing `games.game_id`       |
| `description`  | TEXT          | Game description                              |
| `developer`    | VARCHAR(255)  | Developer of the game                         |
| `publisher`    | VARCHAR(255)  | Publisher of the game                         |
| `rating`       | DECIMAL(3,1)  | Rating of the game (out of 10)                |
| `price`        | DECIMAL(10,2) | Price of the game                             |

## Relationships

- **One-to-One Relationship**: Each entry in the `games` table can have one corresponding entry in the `gameDetails` table. This is enforced through the `game_id` foreign key in `gameDetails`.

## Setup Instructions

### Create Database and Tables
Use the following SQL commands to set up the database and tables:

```sql
-- Create the database
CREATE DATABASE video_games;

-- Use the database
USE video_games;

-- Create the `games` table
CREATE TABLE games (
    game_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    genre VARCHAR(100),
    release_date DATE,
    platform VARCHAR(255)
);

-- Create the `gameDetails` table
CREATE TABLE gameDetails (
    detail_id INT AUTO_INCREMENT PRIMARY KEY,
    game_id INT,
    description TEXT,
    developer VARCHAR(255),
    publisher VARCHAR(255),
    rating DECIMAL(3,1),
    price DECIMAL(10,2),
    FOREIGN KEY (game_id) REFERENCES games(game_id)
);
