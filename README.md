# pf_db_api

## About

"pf" stands for Project FLIPNOTIK, a game I tried making in RPG Maker XP between 2009 and 2013. 
"db" stands for database.
"api" means that this is will be the API.

This API will be created using vanilla PHP. I'll use frameworks later.

When it's done, it will be added to this:
http://denshuto.me/pfdatabase

## Example

`/api/1.0/character&id=1` will return the character (rather, all the characters) with id = 1.
`/api/1.0/character&str_rating=B` will return all characters whose strength stat rating is B.
Things like that.

## Notes

- Again, it's not done yet
- config.php does not contain the actual MySQL login information used on the live website. What do you think I am, stupid?