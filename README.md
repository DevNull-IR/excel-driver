# In the name of **allah**
The first array that starts the work, the second array that is in that array becomes Excel rows, and the values that are placed in the second arrays become Excel columns.
# How to use
![Excel Derver](https://raw.githubusercontent.com/DevNull-IR/excel-driver/main/github-header-image%20(1).png)
**The first translation:**

This package works as a two-dimensional Array. It means that the first presentation is the beginning of the Excel document and the second dimension array is the rows of Excel and the values inside the arrays of the second dimension are the columns of each row in Excel.

**The second translation:**

This package works as a 2D display. That is, the first presentation is the beginning of the Excel document and the second dimension array of Excel rows and the values inside the second dimension arrays of the columns of each row in Excel.
```php
$excel = [
// starts
    // Rows
    [
    // Columns
        "Column 1 1",
        "Column 1 2",
        "Column 1 3",
        "Column 1 4",
    ],
    [
    // Columns
        "Column 2 1",
        "Column 2 2",
        "Column 2 3",
        "Column 2 4",
    ],
    [
    // Columns
        "Column 3 1",
        "Column 3 2",
        "Column 3 3",
        "Column 3 4",
    ],
];
```

## openDocument
open excel file : 


`array|bool openDocument(string $file_path, bool $isNullCreated = true, bool $compailer = false)`


```php
\ExcelDriver\Excel::openDocument("path/to.csv", false, false);
```

extension : "**.csv**"

First parametr: File path to save the generated Excel file

Second parametr: If the file does not exist, should a new file be created without content or not? True Or False (BOOL)

Third parametr: The output must be provided in compiled form, that is, if the max function is used, its output must also be displayed.

## editDocument

Any value entered into the array will be replaced.


`bool editDocument(string $file_path, array $data = [], bool $isNullCreated = false)`

```php
\ExcelDriver\Excel::editDocument("path/to.csv", [[2, null, 7]], false)
```
extension : "**.csv**"

First parametr: File path to save the edted Excel file

Second parametr: Enter the data as a two-dimensional array to be replaced

Third parametr: If the file does not exist, should a new file be created without content or not? True Or False (BOOL)

## editWithClear


Previous values are deleted and new values are entered.


`bool editWithClear(string $file_path, array $data = [], bool $isNullCreated = false)`

```php
\ExcelDriver\Excel::editWithClear("path/to.csv", [[2, null, 7]], false)
```

extension : "**.csv**"

First parametr: File path to save the edted Excel file

Second parametr: Enter the data as a two-dimensional array to be replaced

Third parametr: If the file does not exist, should a new file be created without content or not? True Or False (BOOL)

## createDocument

If the Excel file does not exist, it will create it.

`bool createDocument(string $file_path, array $data)`

```php
\ExcelDriver\Excel::createDocument("path/to.csv", [[2, null, 7]])
```

extension : "**.csv**"

First parametr: File path to save the edted Excel file

Second parametr: Enter the data as a two-dimensional array to be replaced

## getWithCompiler

If you have used Excel formulas, it will interpret them.

To use the Excel formulas at the beginning of the content that you use in the second dimension of the array, you must first use equal signs or `=`.

`getWithCompiler(string $file_path)`

```php
\ExcelDriver\Excel::getWithCompiler("path/to.csv")
```

The output will be an array or boolean value.

## buildWithCompiler

This method saves the interpreted output in the path you want.

`buildWithCompiler(string $file_path, array $data)`


```php
$path = "path/to.csv";
\ExcelDriver\Excel::buildWithCompiler($path, [["=max(1, 3, 5, 7, 9)"]])
```

extension : "**.csv**"

First parametr: File path to save the edted Excel file

Second parametr: Enter the data as a two-dimensional array to be compailed

# Update

## Version 1.1

- [X] Add function `PMT()`.
- [X] Add function `AVERAGE()`.
- [X] Add function `SUMPRODUCT()`.
- [X] Add function `SUM()`.
- [X] Add function `LEN()`.
- [X] Fix bug for Method getWithCompiler.
- [X] add Method `\ExcelDriver\Excel::buildWithCompiler()`
