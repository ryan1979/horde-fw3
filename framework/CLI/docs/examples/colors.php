#!/usr/bin/env php
<?php
/**
 * @package Horde_CLI
 */

require dirname(__FILE__) . '/CLI.php';

$cli = Horde_CLI::singleton();

/* Explicit colors */
$cli->writeln($cli->red('Red'));
$cli->writeln($cli->yellow('Yellow'));
$cli->writeln($cli->green('Green'));
$cli->writeln($cli->blue('Blue'));
$cli->writeln();

/* These messages are automatically colorized based on the message type. */
$cli->message('test', 'cli.error');
$cli->message('test', 'cli.warning');
$cli->message('test', 'cli.success');
$cli->message('test', 'cli.message');
