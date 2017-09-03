# LiteRT Console

## 概述

Console 是一个用于提供控制台输入输出的库，它只有一个类
`L\Kits\Console`。下面逐个介绍其方法。

## 1. 方法 __construct

这是 Console 类的构造函数。

### 1.1. 方法签名

```php
public function __construct(
    $stdout = \L\Kits\Console::DEFAULT_STDOUT,
    $stdin = \L\Kits\Console::DEFAULT_STDIN,
    $stderr = \L\Kits\Console::DEFAULT_STDERR
): void;
```

### 1.2. 方法参数

-   `$stdout: int|string` 可选

    这个参数用于指定将输出流输出到何处。如果传递 int 类型的参数，则被认为是一个
    文件描述符，输出流将从该文件指针的当前位置开始写入；如果传递一个 string 类型
    的参数，则认为是一个文件名，Console 对象将打开这个文件，并将输出流写到文件尾。

    > 默认为标准输出流。

-   `$stdin: int|string` 可选

    这个参数用于指定将输入流从何处读取。如果传递 int 类型的参数，则被认为是一个
    文件描述符，输入流将从该文件指针的当前位置开始读取；如果传递一个 string 类型
    的参数，则认为是一个文件名，Console 对象将打开这个文件，输入流将从文件开头
    开始读取数据。

    > 默认为标准输入流。

-   `$stderr: int|string` 可选

    这个参数用于指定将错误流输出到何处。如果传递 int 类型的参数，则被认为是一个
    文件描述符，错误流将从该文件指针的当前位置开始写入；如果传递一个 string 类型
    的参数，则认为是一个文件名，Console 对象将打开这个文件，并将错误流写到文件尾。

    > 默认为标准错误流。

### 1.3. 返回值

构造函数没有返回值。

---------------------------------------------------------------

## 2. 方法 __destruct

这是 Console 类的析构函数。

### 2.1. 方法签名

```php
public function __destruct(): void;
```

### 2.2. 返回值

析构函数没有返回值。

---------------------------------------------------------------

## 3. 方法 redirectErrorToFile

此方法根据文件名，将错误流重定向到一个文件。

### 3.1. 方法签名

```php
public function redirectErrorToFile(
    string $file
): Console;
```

### 3.2. 方法参数

-   `$file: string`

    这个参数用于指定将错误流输出到何处。须传递一个 string 类型的参数，作为文件名，
    Console 对象将打开这个文件，并将错误流写到文件尾。

### 3.3. 返回值

返回 Console 对象本身。

---------------------------------------------------------------

## 4. 方法 redirectErrorToFileDtr

此方法根据文件描述符，将错误流重定向到一个文件。

### 4.1. 方法签名

```php
public function redirectErrorToFileDtr(
    int $fd
): Console;
```

### 4.2. 方法参数

-   `$fd: int`

    这个参数用于指定将错误流输出到何处。须传递 int 类型的参数作为文件描述符，
    错误流将从该文件指针的当前位置开始写入。

### 4.3. 返回值

返回 Console 对象本身。

---------------------------------------------------------------

## 5. 方法 redirectOutputToFile

此方法根据文件名，将输出流重定向到一个文件。

### 5.1. 方法签名

```php
public function redirectOutputToFile(
    string $file
): Console;
```

### 5.2. 方法参数

-   `$file: string`

    这个参数用于指定将输出流输出到何处。须传递一个 string 类型的参数，作为文件名，
    Console 对象将打开这个文件，并将输出流写到文件尾。

### 5.3. 返回值

返回 Console 对象本身。

---------------------------------------------------------------

## 6. 方法 redirectOutputToFileDtr

此方法根据文件描述符，将输出流重定向到一个文件。

### 6.1. 方法签名

```php
public function redirectOutputToFileDtr(
    int $fd
): Console;
```

### 6.2. 方法参数

-   `$fd: int`

    这个参数用于指定将输出流输出到何处。须传递 int 类型的参数作为文件描述符，
    输出流将从该文件指针的当前位置开始写入。

### 6.3. 返回值

返回 Console 对象本身。

---------------------------------------------------------------

## 7. 方法 setInputFromFile

此方法根据文件名，将输入流重定向到一个文件。

### 7.1. 方法签名

```php
public function setInputFromFile(
    string $file
): Console;
```

### 7.2. 方法参数

-   `$file: string`

    这个参数用于指定将输入流从何处读取数据。须传递一个 string 类型的参数，作为
    文件名，Console 对象将打开这个文件，输入流将从文件开头开始读取数据。

### 7.3. 返回值

返回 Console 对象本身。

---------------------------------------------------------------

## 8. 方法 setInputFromFileDtr

此方法根据文件描述符，将输入流重定向到一个文件。

### 8.1. 方法签名

```php
public function setInputFromFileDtr(
    int $fd
): Console;
```

### 8.2. 方法参数

-   `$fd: int`

    这个参数用于指定将输出流输出到何处。须传递 int 类型的参数作为文件描述符，
    输入流将从该文件指针的当前位置开始读取。

### 8.3. 返回值

返回 Console 对象本身。

---------------------------------------------------------------

## 9. 方法 closeError

此方法关闭错误流，即是说 error 和 errorLine 方法将不会再输出任何信息。

### 9.1. 方法签名

```php
public function closeError(): Console;
```

### 9.2. 返回值

返回 Console 对象本身。

---------------------------------------------------------------

## 10. 方法 closeOutput

此方法关闭输出流，即是说 write 和 writeLine 方法将不会再输出任何信息。

### 10.1. 方法签名

```php
public function closeOutput(): Console;
```

### 10.2. 返回值

返回 Console 对象本身。

---------------------------------------------------------------

## 11. 方法 closeInput

此方法关闭输出流，即是说 read 和 readLine 方法将无法再读取任何信息。

### 11.1. 方法签名

```php
public function closeInput(): Console;
```

### 11.2. 返回值

返回 Console 对象本身。

---------------------------------------------------------------

## 12. 方法 resetError

此方法将重置错误流为标准错误流。

### 12.1. 方法签名

```php
public function resetError(): Console;
```

### 12.2. 返回值

返回 Console 对象本身。

---------------------------------------------------------------

## 13. 方法 resetInput

此方法将重置输入流为标准输入流。

### 13.1. 方法签名

```php
public function resetInput(): Console;
```

### 13.2. 返回值

返回 Console 对象本身。

---------------------------------------------------------------

## 14. 方法 resetOutput

此方法将重置输出流为标准输出流。

### 14.1. 方法签名

```php
public function resetOutput(): Console;
```

### 14.2. 返回值

返回 Console 对象本身。

---------------------------------------------------------------

## 15. 方法 write

此方法将一段文字写入到输出流。

> 如果输出流被 closeOutput 方法关闭，则此方法不做任何操作。

### 15.1. 方法签名

```php
public function write(
    string $text
): Console;
```

### 15.2. 方法参数

-   `$text: string`

    要被写入到输出流的文字。

### 15.3. 返回值

返回 Console 对象本身。

---------------------------------------------------------------

## 16. 方法 writeLine

此方法将一段文字写入到输出流，并自动换行。

> 如果输出流被 closeOutput 方法关闭，则此方法不做任何操作。

### 16.1. 方法签名

```php
public function writeLine(
    string $text
): Console;
```

### 16.2. 方法参数

-   `$text: string`

    要被写入到输出流的文字。

### 16.3. 返回值

返回 Console 对象本身。

---------------------------------------------------------------

## 17. 方法 error

此方法将一段文字写入到错误.流。

> 如果错误流被 closeError 方法关闭，则此方法不做任何操作。

### 17.1. 方法签名

```php
public function error(
    string $text
): Console;
```

### 17.2. 方法参数

-   `$text: string`

    要被写入到错误流的文字。

### 17.3. 返回值

返回 Console 对象本身。

---------------------------------------------------------------

## 18. 方法 errorLine

此方法将一段文字写入到错误.流，并自动换行。

> 如果错误流被 closeError 方法关闭，则此方法不做任何操作。

### 18.1. 方法签名

```php
public function errorLine(
    string $text
): Console;
```

### 18.2. 方法参数

-   `$text: string`

    要被写入到错误流的文字。

### 18.3. 返回值

返回 Console 对象本身。

---------------------------------------------------------------

## 19. 方法 read

此方法将从输入流读取一段指定长度的文字（或者遇到换行符则强制结束）。

> 如果输入流被 closeInput 方法关闭，则此方法不做任何操作。

### 19.1. 方法签名

```php
public function read(
    int $maxLen,
    string $default = ''
): string;
```

### 19.2. 方法参数

-   `$maxLen: int`

    要读取的字节数。

-   `$default: string` 可选

    如果没有读取到任何数据，则返回此参数的值。

### 19.3. 返回值

返回从输入流读取的内容，读取失败则返回 `$default` 参数的值。

---------------------------------------------------------------

## 20. 方法 readLine

此方法将从输入流读取一段文字，遇到换行符结束。

> 如果输入流被 closeInput 方法关闭，则此方法不做任何操作。

### 20.1. 方法签名

```php
public function readLine(
    string $default = ''
): string;
```

### 20.2. 方法参数

-   `$default: string` 可选

    如果没有读取到任何数据，则返回此参数的值。

### 20.3. 返回值

返回从输入流读取的内容，读取失败则返回 `$default` 参数的值。

---------------------------------------------------------------

## 21. 方法 flushInput

此方法将输入流中未读取的内容全部跳过。

> 如果错误流被 closeError 方法关闭，则此方法不做任何操作。

### 21.1. 方法签名

```php
public function flushInput(): Console;
```

### 21.2. 返回值

返回 Console 对象本身。

===============================================================================