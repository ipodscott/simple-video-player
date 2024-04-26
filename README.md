# Simple Video Player

Simple Video Player is a lightweight, easy-to-use web application designed to stream videos directly from a JSON-controlled interface. The player is perfect for users who wish to have a customizable video streaming site without the complexity of larger platforms. Content on the site, including the video menu, background image, site title, and description, is managed through a single `data.json` file. Additionally, the site supports direct video play through URL parameters, making it versatile for various use cases.

[Click to View](https://hazzardlabs.com/trailers)

## Features

- **Dynamic Content Management**: Control the site's video menu, background, title, and description from a singular `data.json` file.
- **Direct Video Play**: Play videos directly by appending a video file URL to the site URL (e.g., `https://siteurl.com/?u=vid.mp4`).
- **Automatic Video Poster**: Automatically adds a video poster if the `.webp` poster name matches the video name (e.g., `vid.webp` for `vid.mp4`).

## Setup

### Requirements

- Web server with PHP or a similar runtime that can serve JSON files (for local testing, servers like XAMPP or MAMP can be used).
- Basic understanding of JSON.

### Installation

1. **Clone the Repository**
   
   Clone the Simple Video Player repository to your web server's hosting directory.

