# Sample Laravel API

This is a sample Laravel restful API.

## Requirements

- Docker
- Composer
- Laravel Sail

## Installation

1. Clone the repository

    ```bash
    git clone https://github.com/GilTSN/sample-laravel-api.git
    ```

2. Start Sail

    ```bash 
    ./vendor/bin/sail up -d
    ```

5. Run migrations

    ```bash
    ./vendor/bin/sail artisan migrate
    ```

6. Access the application at http://localhost

## Usage

- Start containers

    ```bash
    ./vendor/bin/sail up
    ```

- Stop containers

    ```bash
    ./vendor/bin/sail down
    ```

- Access CLI 

    ```bash
    ./vendor/bin/sail artisan
    ```

- Run tests

    ```bash 
    ./vendor/bin/sail test
    ```

## Available Endpoints

### GET /api/posts

- Example response:
```
[
  {
    "id": 1,
    "title": "Post 1",
    "content": "Content of post 1",
    "slug": "post-1"
  },
  {
    "id": 2,
    "title": "Post 2", 
    "content": "Content of post 2",
    "slug": "post-2"
  }
]
```

### GET /api/posts/{id}

- Example response:
```
{
  "id": 1,
  "title": "Post 1",
  "content": "Content of post 1" 
}
```

### POST /api/posts

- Example request body:

```
{
  "title": "New Post",
  "content": "Content of new post"
}
```

- Example response:

```
{
  "id": 3,
  "title": "New Post",
  "content": "Content of new post",
  "slug": "new-post"
}
```

### PUT /api/posts/{id}

- Example request body:

```
{
  "title": "Updated Post Title" 
}
```

- Example response:

```
{
  "id": 3,
  "title": "Updated Post Title",
  "content": "Content of new post",
  "slug": "original-post-title"
}
```

### DELETE /api/posts/{id}

- Example response:

```
"1"
```