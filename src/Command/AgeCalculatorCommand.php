<?php

namespace App\Command;

use App\Person\Manager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AgeCalculatorCommand extends Command
{
    protected static $defaultName = 'app:age:calculator';
    protected $personManager;

    /**
     * AgeCalculatorCommand constructor.
     * @param  Manager $ageManager
     */
    public function __construct( Manager $personManager)
    {
        $this->personManager = $personManager;

        parent::__construct();
    }


    protected function configure()
    {
        $this
            ->setDescription('Calculates age by using input date of birth, optionally checks if adult')
            ->addArgument('dateOfBirth', InputArgument::OPTIONAL, 'Date of birth (Y-m-d format)')
            ->addOption('adult', null, InputOption::VALUE_NONE, 'Check if adult')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('dateOfBirth');

        $person = $this->personManager->getPerson($arg1);
        $age = $person->getAge();
        $isAdult = $person->isAdult();

        if ( $age ) {
            $io->note(sprintf('Your age is: %s', $age));
            if ($input->getOption('adult') && $isAdult) {
                $io->success( 'You are definitely adult');
            } else if ($input->getOption('adult') && !$isAdult){
                $io->warning( 'Sorry, you are not Adult');
            }
        } else {
            $io->note('Wrong date input format - please enter date as "YYYY-mm-dd"');
        }


    }
}
