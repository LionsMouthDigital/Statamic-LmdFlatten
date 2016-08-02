# LMD Flatten
LMD Flatten works just like Statamic's built-in `flatten` modifier except you can pass it a depth
to flatten.

This isn't possible with Statamic core, because it runs on Laravel 5.1 (as of v2.1), and the feature
debuted in Laravel 5.2.

## Usage
```statamic
{{# Just like core `flatten`. #}}
{{ array_value | lmd_flatten }}

{{# Only flatten one level. #}}
{{ array_value | lmd_flatten:1 }}
```

## More info
The underlying code changed a bit in 5.3, but it's not out yet, so for pretty docs, check out
[Laravel 5.2's Docs][5.2].

If you're paranoid something may be different, you can also see the [5.3 docs-in-progress][5.3].

[5.2]: https://laravel.com/docs/5.2/collections#method-flatten
[5.3]: https://github.com/laravel/docs/blob/5.3/collections.md
