Blog Project
--------------------------------------------------------------------------------------------------
This is a simple blog project that allows users to register, log in, and create blog posts. Users can write and publish blog posts with a title and body content. The project includes features such as user authentication, post creation, post listing, and like/unlike functionality for each post. Guest users can view the blog posts and see the number of likes, but they cannot create posts or like any. Authenticated users have the ability to like and unlike posts and can delete their own posts. In the future, there are plans to add a comment feature to allow users to write comments for each post.

--------------------------------------------------------------------------------------------------
Features
--------------------------------------------------------------------------------------------------
(1) User authentication: Users can sign up, log in, and log out.
(2) Create and publish blog posts: Users can write and publish their own blog posts with a title and body.
(3) View blog posts: Guest users can view existing blog posts and see the number of likes.
(4) Like/Unlike posts: Authenticated users can like and unlike posts.
(5) Delete posts: Authenticated users can delete their own posts.
(6) Comment functionality (future plan): Users will be able to write comments for each post.

--------------------------------------------------------------------------------------------------
Technologies Used
--------------------------------------------------------------------------------------------------
(1) PHP (Laravel Framework)
(2) HTML
(3) CSS (Bootstrap)
(4) JavaScript

--------------------------------------------------------------------------------------------------
Installation
--------------------------------------------------------------------------------------------------
(1) Clone the repository:
git clone https://github.com/your-username/blog-project.git

(2) Navigate to the project directory:
cd blog-project

(3) Install dependencies using Composer:
composer install

(4) Create a copy of the .env.example file and rename it to .env. Update the necessary configuration values such as database credentials.

(5) Generate an application key:
php artisan key:generate

(6) Run the database migrations:
php artisan migrate

(7) Start the development server:
php artisan serve

(8) Open your web browser and access the application at http://localhost:8000.

--------------------------------------------------------------------------------------------------
Usage
--------------------------------------------------------------------------------------------------
(1) Register a new account or log in if you already have one.
(2) Create a new blog post by providing a title and body content.
(3) Browse through the existing posts and see the number of likes.
(4) Authenticated users can like and unlike posts.
(5) Authenticated users can delete their own posts.
(6) Guest users can only view the blog posts and see the number of likes.

--------------------------------------------------------------------------------------------------
Future Plans
--------------------------------------------------------------------------------------------------
Implement comment functionality: Allow users to write comments for each blog post.

--------------------------------------------------------------------------------------------------
Acknowledgments
--------------------------------------------------------------------------------------------------
Laravel - The PHP framework used for this project.
Bootstrap - The CSS framework used for styling the application.
