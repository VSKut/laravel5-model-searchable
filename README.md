# Laravel 5 Model Trait Searchable

Provides the searching trait for Laravel Eloquent models.

This package has been developed by Markus Lind. Visit me at [vskut.ru](http://vskut.ru).

## Install

Via composer:

`$ composer require vskut/laravel5-model-searchable`

## Usage
### Model
```php
use vskut\laravel5ModelSearchable\Searchable;

class User extends Model
{
    use Searchable;

}
```

### Controller
```php
class UserController
{

    public function index()
    {
        $user = User::searchable(request()->get('search'))
            ->get();

        return view('user.index', compact('user'));
    }
}
```

### View
```html
<form action="{{ route('user.index') }}" method="get">
    <input type="text" name="search" value="{{ request()->get('search') }}">
    <button type="submit">Search</button>
</form>
```


## Credits

* [Markus Lind](https://github.com/vskut)
* [All Contributors](https://github.com/vskut/laravel5-model-searchable/contributors)

## License

The MIT License (MIT).
