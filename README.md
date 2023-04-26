# Repository Design Pattern & Laravel Practice

The Repository pattern is a way to organize software code that separates the parts of the code that deal with storing data from the parts of the code that deal with the application's logic.
This separation makes it easier to focus on one part of the code at a time and to change the way data is stored without affecting the rest of the code.

The Repository pattern creates an interface between the application code and the data storage code.
The interface defines a set of standard methods for storing, retrieving, updating, and deleting data.
The Repository class provides an implementation of those methods, using whatever storage technology is appropriate, such as a database or a file system.

By using the Repository pattern, you can achieve several benefits:

1. Keep the application logic separate from the data storage logic.
2. Put all the data storage code in one place, making it easier to manage and change.
3. Hide the details of the data storage implementation from the rest of the code.
4. Make it easier to test the application logic by providing a mock implementation of the repository.

## Implementation

In this project, we use the Repository pattern, which is composed of two parts: an interface and a concrete class that implements it.
The interface defines a set of standard methods that the application code can use to communicate with the data storage code.
On the other hand, the concrete class provides the actual implementation of those methods using the Eloquent ORM.
This allows the application code to interact with the database without having to know the details of the underlying database technology.

For example, the `BaseRepositoryInterface` interface defines the methods that can be used to perform CRUD operations on models:
If these lines apply on `CommentRepositoryInterface`, these methods can perform CRUD operations on `Comment` model.

```php
interface BaseRepositoryInterface // Or interface CommentRepositoryInterface
{
    public function all(): Collection;

    public function find(int|string $id): ?stdClass;

    public function create(array $data): stdClass;

    public function update(int|string $id, array $data): ?stdClass;

    public function delete(int|string $id): bool;
}
```

The `BaseRepository` class implements `BaseRepositoryInterface` and provides the actual implementation of these methods using the Eloquent ORM:

```php
class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(protected Model $model)
    {

    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find(int|string $id): ?stdClass
    {
        return (object) $this->model->findOrFail($id)->toArray();
    }

    public function create(array $data): stdClass
    {
        return $this->model->create([$data])->toArray();
    }

    public function update(string|int $id, array $data): ?stdClass
    {
        return (object) tap($this->model->findOrFail($id))->update($data)->toArray();
    }

    public function delete(int|string $id): bool
    {
        return $this->model->findOrFail($id)->delete();
    }
}
```

The `CommentRepository` class implements `CommentRepositoryInterface`, extends `BaseRepository` and provides to use override methods|new methods.
For example. If you have to pass specific data when data is not passed, this can be handle in CommentRepository.

## USAGE

The repository pattern is useful in the following scenarios:

1. When you need to switch between different data sources, such as a relational database, a NoSQL database, or a web service.
2. When you need to test the application/business logic in isolation from the data persistence layer.
3. When you need to encapsulate the complexity of the data persistence layer from the application/business logic.
4. When you want to provide a consistent interface for the application/business logic to interact with the data persistence layer.

The Repository pattern can make your code easier to understand and maintain by separating different areas of functionality.
It can also help you make changes to one layer without affecting the other.
