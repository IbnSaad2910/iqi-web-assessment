# README

## Project Overview

This project involves managing property listings with various attributes such as location, type, no of rooms, and no of bathrooms. The application exposes an API endpoint to retrieve properties based on specific filters.

## Quick Setup & Run

Follow these steps to run the application locally with minimal setup:

1. Clone the repository

2. Copy the environment file

```bash
   cp .env.example .env
```

3. Install dependencies

```bash
   composer install
```

4. Run migrations and seed data

```bash
   php artisan migrate --seed
```

5. Start the development server

```bash
   php artisan serve
```

6. Access the API endpoint

```bash
   http://127.0.0.1:8000/api/property
```

7. Run the test suite

```bash
   php artisan test
```

## Requirements

The `index` method in the `PropertyController` should support the following filtering parameters:

1. **State Filtering**

   - Filter properties based on the state name.
   - Query Parameter: `state`

2. **Minimum and Maximum Rooms**
   - Filter properties based on the number of rooms.
   - Query Parameters: `min_rooms`, `max_rooms`
3. **Minimum and Maximum Bathrooms**

   - Filter properties based on the number of bathrooms.
   - Query Parameters: `min_bathrooms`, `max_bathrooms`

4. **Pagination**

   - Support pagination for the property listings.
   - Query Parameter: `per_page` (optional). If not provided, return all properties without pagination.

5. **Input Validation**

   - Validate input parameters and return a custom error message for invalid inputs: "The :input is invalid."

6. **Available Properties**
   - Ensure that only available properties are listed

## Instructions

1. Clone this repository to your local machine.

2. Setup `.env` according to the `.env.example` provided.

3. Install Dependencies and Set Up Database

```bash
    composer install
    php artisan migrate --seed

```

4. In your `PropertyController`, create the `index` method to handle incoming requests.

```php
public function index(Request $request)
{
    // Your code here...
}
```

5. Ensure the models are correctly defined with the necessary relationships.

6. Execute the tests to verify your implementation
   `php artisan test`

## Output

### Unit Test

- **Passes** all 4 tests
- **Execution Time**: Ensure that the unit tests run in less than 0.5 seconds

### Submission

To submit your project, please follow these instructions:

- Create a ZIP file of the project, ensuring that you **remove the `vendor` directory** before zipping.
- Alternatively, you can upload your project to a Git repository or an online drive.
- Email the ZIP file or the link to your repository/drive to ebrahim@iqiglobal.com.
