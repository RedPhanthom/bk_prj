## Hypno BookStore PHP + MySQL Project ##

![Hypno Book's Logo](https://i.imgur.com/799vXUh.png?1)

This is a project created for a Summer Class for PHP + MySQL. The intended purpose of this project was to demonstrate our ability of learning PHP and being able to create a working E-Commerce website to display it as our Final Project. 

This project used a bookstore example that was already in a PHP Book that helped me achieve many different things that I personally did not know of or wasn't able to fully understand until I tried to do it myself or from replicating the Code and working on it. 

One of the many different functions that I created in order to make several parts of my project work included: 
   ```php
 function get_book_details($ISBN) {
	    if ((!$ISBN) || ($ISBN == '')) {
        return false;
    }
    
    $conn = db_connect();
    $result = $conn->query("SELECT * FROM Books WHERE ISBN = '" . $ISBN . "'");
    
    if (!$result) {
        return false;
    }
	    $result = @$result->fetch_assoc();
	    return $result;
	}
```
This Function would let me access the bookstore database which is based off MySQL and the InnoDB Engine, which would retrieve the details of any specific book based off the ```$ISBN ``` Variable that would be passed through when the function would be called from wherever it was placed and return the MySQL result back to wherever it will be stored. 
