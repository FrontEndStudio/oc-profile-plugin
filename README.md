# October CMS Profile (extension) plugin

## About

This is a Profile (extension) plugin for [October CMS](https://octobercms.com).
Implementation is based on the [Extending the User plugin](https://vimeo.com/108040919) screencast.
Read more about the [User Plugin](https://octobercms.com/plugin/rainlab-user)

## Custom fields

This plugin extends the profile database with customfields named "headline, about_me". Data is stored in the  "fes_profile_profiles" table, when you make changes to the create_profiles_table.php script run:


```
~ php artisan plugin:refresh Fes.Profile
```