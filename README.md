# In the name of **allah**

# How to use

open excel file : 


`array|bool openDocument(string $file_path, bool $isNullCreated = true, bool $compailer = false)`


```php
\ExcelDriver\Excel::openDocument("path/to.csv", false, false);
```

extension : "**.csv**"

First parametr: File path to save the generated Excel file

Second parametr: If the file does not exist, should a new file be created without content or not? True Or False (BOOL)

Third parametr: The output must be provided in compiled form, that is, if the max function is used, its output must also be displayed.


# Update

## Version 1.1

- [X] Add function `PMT()`.
- [X] Add function `AVERAGE()`.
- [X] Add function `SUMPRODUCT()`.
- [X] Add function `SUM()`.
- [X] Add function `LEN()`.
- [X] Fix bug for Method getWithCompiler.
- [X] add Method `\ExcelDriver\Excel::buildWithCompiler()`