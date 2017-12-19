# [Documentation](https://startbootstrap.com/template-overviews/sb-admin/).

## Preview

[![SB Admin Preview](https://thedailyeye.info/nl/TEST/demodash.png)](https://blackrockdigital.github.io/startbootstrap-sb-admin/)

**[View Live Preview](https://blackrockdigital.github.io/startbootstrap-sb-admin/)**

## Login Page

 To begin using this form, choose one of the following options to get started:
* Enter Your User Name & Password(index.php)
* It redirect to checklogin.php where the credentials are blank then disply error msg.
* Match credential with DB credential if matched then redirect to login_success.php else disply error msg.
* Here check if credential is in session or not if yes then redirect to home.php else redirect to index.php page

## Home Page

* By default all data fetched on home page.
* Search box is for to serch the fetched data. 
* We can sort out data ascending order or deascending order by clicking on arrow present side of column name.
* By default 10 entries are displayed on screen. We can display more entries by selecting number of entries.


### Entire Data
* By default 10 entries are displayed on screen. 
* Entire data is same as home page data.

### Add Data
## Preview

[![SB Admin Preview](https://thedailyeye.info/nl/TEST/adddash.png)](https://blackrockdigital.github.io/startbootstrap-sb-admin/)
* Add Button redirect to new page where we can add new record (add.php).
* "Back to list" button redirect to home page(home.php).


### Update Data

## Preview

[![SB Admin Preview](https://thedailyeye.info/nl/TEST/Updatedashpng.png)](https://blackrockdigital.github.io/startbootstrap-sb-admin/)
* Update button redirect to Update record where we can update your data (update.php).
* "Back to list" button redirect to home page(home.php).

### Delete Data
* Delete the data from DB.

## Database

*  Database connection are store in db.php file.
*  Foe DB access PDO connection is used.
*  Name of DB is Dashboard.
*  Name of tabel is YearEnder.
