# Cup Stories
## Small Reading Treats
repositories: [cup_stories_back](https://github.com/francesca-golzio/cup_stories_back.git) & [cup_stories_front](https://github.com/francesca-golzio/cup_stories_front.git)

I built *Cup Stories*, with a Laravel backend and a separate React frontend, around the concept of a Digital Short Story Magazine. This is my final curricular project in the Boolean Web Development Master Program.

This repository hosts the Laravel backend, which features a protected back-office for managing content through a Bootstrap-based admin interface and a public JSON API for the front-end to consume.

The frontend is maintained separately in the [cup_stories_front repository](https://github.com/francesca-golzio/cup_stories_front.git).


### ✨ Technologies
#### Backend
- PHP 8.4
- Laravel 12
- Eloquent ORM
- Blade templating
- Laravel Breeze
- Artisan CLI
#### Admin UI & Styling
- Bootstrap 5
- Custom CSS
- Bootstrap Icons
- Blade views
#### Development tools
- Composer
- npm
- Vite
- PHPUnit

### ⚙️ Setup
To run this project locally, you can follow these steps:

#### 1. Install dependencies

``` bash
composer install
npm install
```

#### 2. Create the environment file
Create a copy of the `.env.example` file and rename it `.env`.

#### 3. Configure the environment
Open `.env` and review the following project-specific variables:

- `APP_URL`: the URL where the Laravel backend runs, also used by the seeders to generate images paths.
- `APP_FRONTEND_URL`: the URL where the React frontend runs, also used by the backend CORS configuration.
- Database settings: configure the following variables according to your local database setup:
  - `DB_CONNECTION`
  - `DB_HOST`
  - `DB_PORT`
  - `DB_DATABASE`
  - `DB_USERNAME`
  - `DB_PASSWORD`
- `FILESYSTEM_DISK`: keep this set to `public` so uploaded files and seeded images are stored in Laravel's public storage.
- `PASSWORD`: set a local password for the development user created by the database seeder.

Keep the remaining values from `.env.example` unless your local setup requires different settings.

#### 4. Generate the application key

``` bash
php artisan key:generate
```

#### 5. Create and seed the database

``` bash
php artisan migrate --seed
```
or
``` bash
php artisan migrate:fresh --seed
```

#### 6. Link public storage

``` bash
php artisan storage:link
```

#### 7. Start the application

Start the servers accordingly to your local development environment, e.g.:

- in the first terminal, start the Laravel development server:
``` bash
php artisan serve
```

- in the second terminal, start the Vite development server:
``` bash
npm run dev
```

#### Local setup notes
- the admin area is restricted to authenticated users
- the development user `PASSWORD` should be configured locally in `.env`
- for the [frontend repository](https://github.com/francesca-golzio/cup_stories_front.git) local setup, see the relative `README`


### 🔒 Authentication and Admin Area
The admin area is accessible only to authenticated (verified) users.
A successful login will redirect the User to the admin area.

![admin dashboard](storage\app\public\screenshots\dashboard.webp)

The admin area allows the authenticated User to manage stories, authors, issues and tags (see CRUD below), but also his/her own profile.

*I'm aware that authentication and permissions are two separate concepts, but in this project, since the back-office is not intended for public consumption, no role system has been implemented.*

### 🛢️ Database
The project uses MySQL as its relational database.

Its main domain entities are:

- ISSUES<br>
`title` `status` `publication_number` `published_at` `color` `cover_img` `slug`

- STORIES<br>
`title` `author_id` `issue_id` `content` `cover_img` `slug`

- AUTHORS<br>
`name` `surname` `photo` `bio` `slug`

- TAGS<br>
`name` `label` `description` `slug`

Stories and tags are connected through a pivot table.



### ✏️ CRUD
Stories, authors, issues and tags are managed through the admin area.
All entities have the following CRUD methods:
- create and store
- show
- edit and update
- destroy

<table>
  <tr>
    <td colspan="5"><img src="storage\app\public\screenshots\stories_index.webp" alt="index view for stories, with CRUD buttons" style="width: 100%; object-fit: cover;"></td>
  </tr>
  <tr>
    <td colspan="5">
      <img src="storage\app\public\screenshots\author_edit_form.webp" alt="author edit form" style="width: 100%; object-fit: cover;">
    </td>
  </tr>
  <tr>
    <td colspan="">
      <p>In addiction, the Issue entities have a patch method to be published or returned to draft status when needed.</p>
    </td>
    <td colspan="2">
      <img src="storage\app\public\screenshots\publish.webp" alt="issues publish button" style="width: 100%; object-fit: cover;">
    </td>
    <td colspan="2">
      <img src="storage\app\public\screenshots\unpublish.webp" alt="issues unpublish button" style="width: 100%; object-fit: cover;">
    </td>
  </tr>
</table>


### 🛜 API

**ISSUES** -> Only published issues are exposed through the public API.
- `/api/issues`<br>
  returns all the issues (paginated list)
- `/api/issues/{issue:pubblication_number}`<br>
  filters the issues by publication number and returns the issue details

**STORIES** -> Only stories assigned to published issues are exposed through the public API.
- `/api/stories`<br>
  returns all the published stories (paginated list)
- `/api/stories/random`<br>
  returns a random story
- `/api/stories/{story:slug}`<br>
  *e.g. /api/stories/beauty-and-the-beast*<br>
  filters the stories by slug and returns the story details

**AUTHORS** -> Only authors associated with published issues are exposed through the public API, with their published stories.
- `/api/authors`,<br>
  returns the authors list
- `/api/authors/{author:slug}`<br>
  *e.g. /api/authors/jane-doe*<br>
  filters the authors by slug and returns the author details<br>  

#### About slugs
While drawing the database schema, I chose to add a unique `slug` field to my entities so that I could generate URLs witout exposing the entities IDs, expecially in the frontend. Only when I was working on the API I realized that that choice was also shaping the API endpoints. This was a good reminder of how everithing is connected and how the choices we make can shape the quality of the interaction between the backend and the frontend.

### 🌱 Seeders
The seeders create sample authors, issues, tags and stories, a development user and also story/tag relationships.

The first issue *(pubblication_number = 0)* serves as a container for the unassigned stories; APIs and seeders are configured accordingly.

The development sample User has a default email, which can be easily customized, and a default password that must be configured in the local `.env` file.

### 🌐 Public storage
Uploaded files and seeded images are stored in local storage and made available through a symbolic link. The database stores only the file path.




### 📝 License
This project is released under the MIT license.