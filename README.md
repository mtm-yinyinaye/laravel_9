
## Controller Route Group

```
Route::controller()->group(function() {
    Route::get($url, $method);
})

```

## Eloquent accessors / mutators

### Old Code 

```
public function sgetNameAttribute($value)
{
    return strtolower($value);
}

public function setNameAttribute($value)
{
    $this->attributes['name'] = strtolower($value);
}

```

### New Code
```
public function name($value) : Attribibute
{
    return new Attribibute (
        get: fn ($val) => strtoUpper($value);
        set: fn ($val) => strtolower($value);
    )
}

```

## Fulltext indexes and where clauses

```
Same wherelike method (, % Like %, )

```

## Laravel Scout Database Engine

```
Same wherelike method (, % Like %, ) but can search all value of column field

```

## Rendering Inline Blade Templates

> Blade template string into valid HTML
> Can write Html test


