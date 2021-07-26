save_string_example

This will prompt a user for their username and password and then after a succussful login will ask for a string that should be saved. The string is then displayed in a table below.

If the user doesn't enter the correct login then they will not be able to log in. The login is set via an insert into the mysql database table.

The strings are saved per user. User 2 will not be able to see the strings saved by user 1 and vice versa.
