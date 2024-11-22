# Video Games Database CMS

This is a content management system (CMS) built using PHP for managing a database of video games. The system allows users to store, update, and retrieve information about video games and their detailed descriptions.

## Features

- **Manage Games**: Add, view, and delete games.
- **Manage Game Details**: Add detailed information for each game, including developer, publisher, rating, price, and description.
- **One-to-One Relationship**: Each game in the database can have one corresponding entry with detailed information stored in a separate table.
  
## Relationships

- **One-to-One Relationship**: Each entry in the `games` table has one corresponding entry in the `gameDetails` table. This relationship is maintained via a foreign key reference.

## Setup Instructions

1. **Create the Database and Tables**: 
   - Set up the database by running the provided SQL commands in your MySQL/MariaDB environment.
   
2. **Requirements**: 
   - PHP version 7.0 or higher.
   - MySQL/MariaDB for the database.
   - Apache or Nginx with PHP support.

3. **Files**: 
   - **index.php**: Displays the list of games.
   - **add_game.php**: Adds new games to the database.
   - **add_gameDetails.php**: Adds detailed information for each game.
   - **edit_game.php**: Edits the game information.
   - **edit_gameDetails.php**: Edits the game detail information.
   - **delete_game.php**: Deletes a game from the database.
   - **delete_gameDetails.php**: Deletes the game details from the database.
   - **connect.php**: Contains database connection details.

## Usage

1. **Add a Game**: Navigate to the "Add Game" section and enter the game details such as name, genre, release date, and platform.
2. **Add Game Details**: After adding a game, you can input detailed information about the game, such as developer, publisher, description, rating, and price.
3. **View Games**: View a list of all games along with their details.
4. **Edit Game Information**: Update the game’s name, genre, release date, and platform.
5. **Edit Game Details**: Update the detailed information about each game.
6. **Delete a Game**: Remove a game from the database.
7. **Delete Game Details**: Remove detailed information about a game.

## Contributing

Feel free to fork this repository, submit issues, and create pull requests for improvements.

## License

This project is licensed under the MIT License.

## Acknowledgements

- Built with PHP and MySQL for server-side scripting and database management.
