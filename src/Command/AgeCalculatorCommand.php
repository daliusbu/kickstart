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

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('dateOfBirth');

        $person = $this->personManager->getPerson($arg1);
        $age = $person->getAge();
        $isAdult = $person->isAdult();
        $hasOption = $input->getOption('adult');
        $reply = $isAdult? 'YES !!' : 'NO !!!';

        if ( $age ) {
            $io->note(sprintf('I am %s years old', $age));
            if ( $hasOption && $isAdult) {
                $io->success( sprintf('Am I an adult? ---- %s', $reply));
            } else if ( $hasOption && !$isAdult){
                $io->warning( sprintf('Am I an adult? ---- %s', $reply));
            }
        } else {
            $io->note('Wrong input date format - please enter date as "yyyy-mm-dd"');
        }
    }
}
