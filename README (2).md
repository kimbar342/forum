php artisan migrate


php artisan tinker

create users
    {
        php artisan tinker
        \App\Models\User::factory(50)->create()
    }


create topic
    {
        php artisan tinker
        \App\Models\Topic::factory(40)->create()
    }


create commetns
        {
            php artisan tinker
            \App\Models\Comment::factory(50)->create()
        }






