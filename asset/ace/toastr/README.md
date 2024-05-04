#Toastr

This is a jQuery custom module of Toastr notifications.

How can I use?

1.- Download the project from repository:

``https://github.com/jprous85/toastr-jquery.git``

2.- Use only files inside of js and css folders, before, call the files inside your personal project.
> Remember that this version it's needed a jQuery files, included inside of the project.  

3.- Before, use jQuery instance for using the module.

```
$(document).toastr({
    align: 'center',
    status: 'info',
    text_heading: 'Title',
    text_body: 'body text'
});
```

##Options of module:
#####Aligns

|  Align | text |
|---|---|
| Left | 'left' |
| Center | 'center' |
| Right | 'right' |

#####Colors

|  Color | text |
|---|---|
| Information | 'info' |
| Success | 'success' |
| Notice | 'notice' |
| Danger | 'danger' |



``Jprous. 2020``
