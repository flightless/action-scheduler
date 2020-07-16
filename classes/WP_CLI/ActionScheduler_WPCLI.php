<?php

namespace Action_Scheduler\WP_CLI;

/**
 * Commands for the Action Scheduler.
 */
class ActionScheduler_WPCLI extends \WP_CLI_Command {

	/**
	 * Run the Action Scheduler
	 *
	 * ## OPTIONS
	 *
	 * [--batch-size=<size>]
	 * : The maximum number of actions to run. Defaults to 100.
	 *
	 * [--batches=<size>]
	 * : Limit execution to a number of batches. Defaults to 0, meaning batches will continue being executed until all actions are complete.
	 *
	 * [--cleanup-batch-size=<size>]
	 * : The maximum number of actions to clean up. Defaults to the value of --batch-size.
	 *
	 * [--hooks=<hooks>]
	 * : Only run actions with the specified hook. Omitting this option runs actions with any hook. Define multiple hooks as a comma separated string (without spaces), e.g. `--hooks=hook_one,hook_two,hook_three`
	 *
	 * [--group=<group>]
	 * : Only run actions from the specified group. Omitting this option runs actions from all groups.
	 *
	 * [--free-memory-on=<count>]
	 * : The number of actions to process between freeing memory. 0 disables freeing memory. Default 50.
	 *
	 * [--pause=<seconds>]
	 * : The number of seconds to pause when freeing memory. Default no pause.
	 *
	 * [--force]
	 * : Whether to force execution despite the maximum number of concurrent processes being exceeded.
	 *
	 * [--time]
	 * : Whether to print timestamp on each line.
	 *
	 * [--time-format=<format>]
	 * : Format for the timestamp. Defaults to Y-m-d H:i:s T.
	 *
	 * @param array $args Positional arguments.
	 * @param array $assoc_args Keyed arguments.
	 * @throws \WP_CLI\ExitException When an error occurs.
	 *
	 * @subcommand run
	 */
	public function run( $args, $assoc_args ) {
		$command = new Run_Command( $args, $assoc_args );
		$command->execute();
	}

	/**
	 * Migrate actions to the DB tables store
	 *
	 * ## OPTIONS
	 *
	 * [--batch-size=<batch-size>]
	 * : The number of actions to process in each batch
	 * ---
	 * default: 100
	 * ---
	 *
	 * [--free-memory-on=<free-memory-on>]
	 * : The number of actions to process between freeing memory. 0 disables freeing memory
	 * ---
	 * default: 50
	 * ---
	 *
	 * [--pause=<pause>]
	 * : The number of seconds to pause when freeing memory
	 * ---
	 * default: 0
	 * ---
	 *
	 * [--dry-run]
	 * : Reports on the actions that would have been migrated, but does not change any data
	 *
	 * @param array $args Positional arguments.
	 * @param array $assoc_args Keyed arguments.
	 * @throws \WP_CLI\ExitException When an error occurs.
	 *
	 * @subcommand migrate
	 */
	public function migrate( $args, $assoc_args ) {
		$command = new Migration_Command( $args, $assoc_args );
		$command->execute();
	}

}
