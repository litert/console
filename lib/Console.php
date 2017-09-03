<?php
/*
   +----------------------------------------------------------------------+
   | LiteRT Console Library                                               |
   +----------------------------------------------------------------------+
   | Copyright (c) 2007-2017 Fenying Studio                               |
   +----------------------------------------------------------------------+
   | This source file is subject to version 2.0 of the Apache license,    |
   | that is bundled with this package in the file LICENSE, and is        |
   | available through the world-wide-web at the following url:           |
   | https://github.com/litert/console/blob/master/LICENSE                |
   +----------------------------------------------------------------------+
   | Authors: Angus Fenying <i.am.x.fenying@gmail.com>                    |
   +----------------------------------------------------------------------+
 */

declare (strict_types = 1);

namespace L\Kits;

/**
 * Class Console
 *
 * This class provides the methods to read/write, and control console.
 *
 * @package L\Kits
 */
class Console
{
    const DEFAULT_STDOUT = 'php://stdout';

    const DEFAULT_STDIN = 'php://stdin';

    const DEFAULT_STDERR = 'php://stderr';

    protected $_stdout;

    protected $_stdin;

    protected $_stderr;

    /**
     * Console constructor.
     *
     * @param int|string $stdout
     * @param int|string $stdin
     * @param int|string $stderr
     */
    public function __construct(
        $stdout = self::DEFAULT_STDOUT,
        $stdin = self::DEFAULT_STDIN,
        $stderr = self::DEFAULT_STDERR
    )
    {
        if (is_int($stdout)) {

            $this->redirectOutputToFileDtr($stdout);
        }
        else {

            $this->redirectOutputToFile($stdout);
        }

        if (is_int($stderr)) {

            $this->redirectErrorToFileDtr($stderr);
        }
        else {

            $this->redirectErrorToFile($stderr);
        }

        if (is_int($stdin)) {

            $this->setInputFromFileDtr($stdin);
        }
        else {

            $this->setInputFromFile($stdin);
        }
    }

    public function __destruct()
    {
        $this->closeOutput()->closeError()->closeInput();
    }

    /**
     * Set the target of error text to a file by filename.
     *
     * > The text will be append to the end.
     *
     * @param string $file
     *
     * @return Console
     */
    public function redirectErrorToFile(string $file): Console
    {
        $this->closeError();

        $this->_stderr = fopen($file, 'a');

        return $this;
    }

    /**
     * Set the target of error text to a file by file descriptor.
     *
     * @param int $fd
     *
     * @return Console
     */
    public function redirectErrorToFileDtr(int $fd): Console
    {
        $this->closeError();

        $this->_stderr = $fd;

        return $this;
    }

    /**
     * Set the target of output text to a file by filename.
     *
     * > The text will be append to the end.
     *
     * @param string $file
     *
     * @return Console
     */
    public function redirectOutputToFile(string $file): Console
    {
        $this->closeOutput();

        $this->_stdout = fopen($file, 'a');

        return $this;
    }

    /**
     * Set the target of output text to a file by file descriptor.
     *
     * @param int $fd
     *
     * @return Console
     */
    public function redirectOutputToFileDtr(int $fd): Console
    {
        $this->closeOutput();

        $this->_stdout = $fd;

        return $this;
    }

    /**
     * Set the source of input as a file specified by a filename.
     *
     * @param string $file
     *
     * @return Console
     */
    public function setInputFromFile(string $file): Console
    {
        $this->closeInput();

        $this->_stdin = fopen($file, 'r');

        return $this;
    }

    /**
     * Set the source of input as a file specified by a file descriptor.
     *
     * @param int $fd
     *
     * @return Console
     */
    public function setInputFromFileDtr(int $fd): Console
    {
        $this->closeInput();

        $this->_stdin = $fd;

        return $this;
    }

    /**
     * Close the target of error text.
     *
     * Once error is shutdown, nothing can be output by error and errorLine
     * methods.
     *
     * @return Console
     */
    public function closeError(): Console
    {
        if ($this->_stderr) {

            fclose($this->_stderr);
            $this->_stderr = null;
        }

        return $this;
    }

    /**
     * Close the target of output text.
     *
     * Once output is shutdown, nothing can be output by write and writeLine
     * methods.
     *
     * @return Console
     */
    public function closeOutput(): Console
    {
        if ($this->_stdout) {

            fclose($this->_stdout);
            $this->_stdout = null;
        }

        return $this;
    }

    /**
     * Close the source of input.
     *
     * Once input is shutdown, nothing can be read from read and readLine
     * methods.
     *
     * @return Console
     */
    public function closeInput(): Console
    {
        if ($this->_stdin) {

            fclose($this->_stdin);
            $this->_stdin = null;
        }

        return $this;
    }

    /**
     * Reset the output text target.
     *
     * @return Console
     */
    public function resetOutput(): Console
    {
        $this->redirectOutputToFile(self::DEFAULT_STDOUT);
    }

    /**
     * Reset the error text target.
     *
     * @return Console
     */
    public function resetError(): Console
    {
        $this->redirectErrorToFile(self::DEFAULT_STDERR);
    }

    /**
     * Reset the source of input text.
     *
     * @return Console
     */
    public function resetInput(): Console
    {
        $this->setInputFromFile(self::DEFAULT_STDIN);
    }

    /**
     * Print some normal text to console.
     *
     * @param string $text
     *
     * @return \L\Kits\Console
     */
    public function write(string $text): Console
    {
        $this->_stdout && fwrite(
            $this->_stdout,
            $text
        );

        return $this;
    }

    /**
     * Print a line of normal text to console.
     *
     * @param string $text
     *
     * @return \L\Kits\Console
     */
    public function writeLine(string $text): Console
    {
        $this->_stdout && fwrite(
            $this->_stdout,
            $text . PHP_EOL
        );

        return $this;
    }

    /**
     * Print some error text to console.
     *
     * @param string $text
     *
     * @return \L\Kits\Console
     */
    public function error(string $text): Console
    {
        $this->_stderr && fwrite(
            $this->_stderr,
            $text
        );

        return $this;
    }

    /**
     * Print a line of error text to console.
     *
     * @param string $text
     *
     * @return \L\Kits\Console
     */
    public function errorLine(string $text): Console
    {
        $this->_stderr && fwrite(
            $this->_stderr,
            $text . PHP_EOL
        );

        return $this;
    }

    /**
     * Clean up all rest data in input buffer.
     *
     * @return Console
     */
    public function flushInput(): Console
    {
        if ($this->_stdin) {

            if (!feof($this->_stdin)) {

                fseek($this->_stdin, 0, SEEK_END);
            }
        }

        return $this;
    }

    /**
     * Read some number of bytes from the source of input.
     *
     * @param int $maxLen       The max bytes to read.
     *
     * @param string $default   The default text if nothing read.
     *
     * @return string
     */
    public function read(
        int $maxLen,
        string $default = ''
    ): string
    {
        if ($this->_stdin) {

            if ($result = fread($this->_stdin, $maxLen)) {

                return $result;
            }
        }

        return $default;
    }

    /**
     * Read a line from the source of input.
     *
     * @param string $default   The default text if nothing read.
     *
     * @return string
     */
    public function readLine(string $default = ''): string
    {
        if ($this->_stdin) {

            $result = fgets($this->_stdin);

            if ($result !== PHP_EOL) {

                return substr(
                    $result,
                    0,
                    -strlen(PHP_EOL)
                );
            }
        }

        return $default;
    }
}
