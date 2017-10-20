# pf_db_api

## About

"pf" stands for Project FLIPNOTIK, a game I tried making in RPG Maker XP between 2009 and 2013. 
"db" stands for database.
"api" means that this is will be the API.

This API will be created using vanilla PHP. I'll use frameworks later.

You can access it here: `http://denshuto.me/pf_db_api/api/1.0/`
Test application is here: http://denshuto.me/pf_db_api/test/

## Example

`/api/1.0/character&id=1` will return the character (rather, all the characters) with id = 1.
`/api/1.0/character&str_rating=B` will return all characters whose strength stat rating is B.
Things like that.

## Test application

Things you can do:
- register
- log in
- generate new token
- perform API call (requires valid auth token)
- log out, if you feel so inclined

a screenshot:
![test app img 1](http://denshuto.me/img/api.png)

## Notes

- Again, it's not done yet
- config.php does not contain the actual MySQL login information used on the live website. What do you think I am, stupid?