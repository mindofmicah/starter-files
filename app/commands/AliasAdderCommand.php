<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class AliasAdderCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'alias:add';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$config_path = app_path() . '/config/app.php';
		$contents = File::get($config_path);

		$alias = $this->argument('alias');
		$command = $this->argument('command_path');
		
		$new_content = $this->buildNewContent($contents, $this->buildNewEntry($alias, $command));
		
		File::put($config_path, $new_content);
		$this->info('Added alias ' . $alias . ' for command ' . $command);
	}

	protected function buildNewContent($original, $new_command)
	{	
		$strpos = strpos($original, '\'aliases\'');
		$closing = strpos($original, ')', $strpos);
		
		return substr($contents, 0, $closing) . $new_command .  substr($contents,$closing);
	}
	
	protected function buildNewEntry($alias, $command)
	{
		return "\t'{$alias}' => '{$command}',\n\t";
	}
	
	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('alias', InputArgument::REQUIRED, 'Alias to add.'),
			array('command_path', InputArgument::REQUIRED, 'Command to alias'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
	//		array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}