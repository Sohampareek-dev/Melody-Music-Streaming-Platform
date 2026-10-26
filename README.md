# Melody Music — Music Streaming Platform

A full-stack music streaming web application built with **PHP, MySQL, JavaScript, jQuery, HTML, CSS, and Bootstrap**. Melody Music lets users explore songs and albums, play music in the browser, manage playlists, and save favorites. It also includes an admin area for managing music content.

<p align="center">
  <a href="https://youtu.be/yMVnsI-6LfE"><strong>▶ Watch the Project Demo</strong></a>
  &nbsp; • &nbsp;
  <a href="https://github.com/Sohampareek-dev/Melody-Music-Streaming-Platform"><strong>View on GitHub</strong></a>
</p>

## Table of Contents

- [Project Overview](#project-overview)
- [Features](#features)
- [Technology Stack](#technology-stack)
- [Project Structure](#project-structure)
- [Getting Started](#getting-started)
- [Database Configuration](#database-configuration)
- [How to Use](#how-to-use)
- [Possible Improvements](#possible-improvements)
- [Author](#author)

## Project Overview

Melody Music is a web-based music platform created to practise and demonstrate full-stack web development. It combines a browser-based audio player with user account functionality, music discovery, playlists, favorites, and an administration interface.

## Features

### Music Listening and Discovery
- Play audio tracks directly in the browser.
- Browse songs and albums.
- Search for songs.
- View album artwork alongside music content.

### User Features
- User sign-up and sign-in.
- Like and unlike songs and albums.
- View saved/favorite music.
- Create, update, and delete playlists.
- Add and manage songs in playlists.

### Admin Features
- Admin login and dashboard.
- Manage songs, albums, and categories.

### Interactive Interface
- JavaScript and jQuery-powered interactions.
- AJAX-based requests for supported dynamic sections, helping reduce full-page reloads.
- Bootstrap-based responsive UI components.

## Technology Stack

| Technology | Purpose |
|---|---|
| PHP | Server-side logic and application functionality |
| MySQL | Persistent data storage |
| HTML5 | Page structure |
| CSS3 | Styling and layout |
| JavaScript | Client-side interactions and audio-player behaviour |
| jQuery / AJAX | Event handling and asynchronous requests |
| Bootstrap | UI components and responsive layout |

## Project Structure

The names below describe the main application files and folders. Some additional files may be present in the repository.

```text
Melody-Music-Streaming-Platform/
├── admin/                     # Admin area and music-content management
├── album/                     # Album folders, audio files, and cover images
├── database/
│   └── mp3.sql                # MySQL database export
├── index.php                  # Application entry point
├── home_page.php              # Home-page content
├── nav.php                    # Navigation interface
├── topbar.php                 # Top bar interface
├── modals.php                 # Modal components
├── mp3.js                     # Client-side music-player and UI logic
├── sign_up.php                # User registration
├── sign_in.php                # User sign-in
├── logout.php                 # Logout handling
├── album.php                  # Album-related page/functionality
├── more_albums.php            # Additional album display
├── songSearch.php              # Song search
├── like_song.php               # Like a song
├── dislike_song.php            # Unlike a song
├── like_album.php              # Like an album
├── dislike_album.php           # Unlike an album
├── display_likeds.php          # Display liked songs
├── display_likeda.php          # Display liked albums
├── create_playlist.php         # Create a playlist
├── display_plist.php           # Display playlists
├── display_plist_songs.php     # Display playlist songs
├── playlist_edit.php           # Edit playlist details
├── playlist_delete.php         # Delete a playlist
├── update_playlist.php         # Update playlist data
└── ...                         # Other application files
```

## Getting Started

### Prerequisites

Install the following before running the project locally:

- [XAMPP](https://www.apachefriends.org/) or another local PHP/MySQL environment
- A web browser
- Git (optional, for cloning the repository)

### 1. Clone the Repository

Open a terminal and run:

```bash
git clone https://github.com/Sohampareek-dev/Melody-Music-Streaming-Platform.git
cd Melody-Music-Streaming-Platform
```

### 2. Place the Project in the Web Server Directory

For XAMPP on Windows, place the project folder inside:

```text
C:\xampp\htdocs\Melody-Music-Streaming-Platform
```

Start **Apache** and **MySQL** from the XAMPP Control Panel.

### 3. Configure the Database

1. Start **MySQL** in the XAMPP Control Panel and open `http://localhost/phpmyadmin/`.
2. Create a database named **`mp3`** (use the same name as the database connection configured in the project).
3. Select the `mp3` database in phpMyAdmin and open the **Import** tab.
4. Choose the SQL file in the repository: [`database/mp3.sql`](database/mp3.sql). Click **Import** or **Go** to run the import and create the required tables and data.
5. Open the database connection file in the project and confirm the host, username, password, and database name. A typical local XAMPP connection may look like this, but use the values that match your configuration:

```php
$conn = mysqli_connect("localhost", "root", "", "mp3");
```

Do not use the example connection details in a production environment. Keep real credentials out of public repositories.

### 4. Run the Application

With Apache and MySQL running, open:

```text
http://localhost/Melody-Music-Streaming-Platform/
```

If the page fails to load, confirm the folder name, database connection settings, imported database tables, and PHP error logs.

## Database Configuration

The project includes a database export at [`database/mp3.sql`](database/mp3.sql). Import this file into the `mp3` database using phpMyAdmin before launching the application. If you update the database schema during development, export the updated schema and any safe sample data back to this file so that other developers can set up the project.

Before publishing the SQL file, make sure it does not contain real user information, passwords, secret keys, or other sensitive production data. Never publish production database credentials.

## How to Use

1. Start the local web server and database.
2. Open the application in your browser.
3. Register or sign in to access the user features.
4. Browse songs or albums, play music, and use favorites or playlists.
5. Use the admin area with a configured admin account to manage the available music content.

Admin credentials are not included in this README. Configure an admin account in your local development database rather than publishing credentials publicly.

## Possible Improvements

Ideas for future development include:

- Use prepared statements for database queries and validate all user input.
- Use `password_hash()` and `password_verify()` for password storage and verification.
- Enforce server-side authorization checks for every admin-only operation.
- Validate uploaded audio and image files, limit file sizes, and generate safe filenames.
- Escape output to help prevent cross-site scripting (XSS).
- Add automated tests, pagination, accessibility improvements, and deployment documentation.

## Author

**Soham Pareek**

- GitHub: [Sohampareek-dev](https://github.com/Sohampareek-dev)
- Project Repository: [Melody Music Streaming Platform](https://github.com/Sohampareek-dev/Melody-Music-Streaming-Platform)
- Project Demo: [Watch on YouTube](https://youtu.be/yMVnsI-6LfE)

---

If you find this project useful as a learning reference, consider starring the repository on GitHub.
