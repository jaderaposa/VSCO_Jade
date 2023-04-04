<?php

class Logger {
  public function __construct() {
    // Open a log file for writing
    $this->fileHandle = fopen('log.txt', 'a');
  }

  public function writeLog($message) {
    // Write the message to the log file
    fwrite($this->fileHandle, $message . "\n");
  }

  public function __destruct() {
    // Close the log file
    fclose($this->fileHandle);
  }
}

// Create a new logger object
$logger = new Logger();

// Write some logs
$logger->writeLog("An error occurred!");
$logger->writeLog("User logged in");

// The logger object will be automatically destroyed at the end of the script

?>

<!-- In this example, we have a Logger class which is responsible for logging messages to a file. We have a constructor method __construct which opens a log file for writing and a destructor method __destruct which closes the log file.

We also have a writeLog method which takes a message parameter and writes it to the log file.

Finally, we create a Logger object and use it to write some logs. At the end of the script, the Logger object will be automatically destroyed and the __destruct method will be called, which will close the log file. -->