# Part-Time

The links are in the format presented in the email:
https://testforlogs.000webhostapp.com/ is the root and you can add 4 terminations to this root:

- /add_message/(actual message that will be logged) !important, the message cannot be between "<" and ">", these are special characters that PHP ignores because of safety reasons (SQL injections). Full link: https://testforlogs.000webhostapp.com/add_message/(actual message)

- /view_messages displays a list with all the messages, ordered descending based on the time of the log. Full link:https://testforlogs.000webhostapp.com/view_messages

-/delete_all_messages - deletes all messages that are stored in the database. Full link: https://testforlogs.000webhostapp.com/delete_all_messages

-/confid.php - is the file used to create the database, it will be run just if the database is not exitent, if it exists, the database won't be modified.

The service is in REST format as it is not platform dependent, the user is able to send requests independent from the platform.
