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

		$alias = 'Tacos';
		$command = 'mindofmicah\Tacos';
		
		$strpos = strpos($contents, '\'aliases\'');
		$closing = strpos($contents, ')', $strpos);
		$this->info($closing);
		$new = substr($contents,0,$closing) . $this->buildNewEntry() .  substr($contents,$closing);
		$pattern = '%\'aliases\' => array\((.+?)\)%ms';
	
		
	
		File::put($config_path, $new);
		$this->info('Added alias ' . $this->argument('alias') . ' for command ' . $this->argument('command_path'));
	}

	protected function buildNewEntry()
	{
		return "\t".'\''.$this->argument('alias').'\' => \''.$this->argument('command_path').'\',' . "\n\t";
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