<?php

namespace App\Command;

use App\Age\Calculator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AgeCalculatorCommand extends Command
{
    protected static $defaultName = 'app:age:calculator';

    protected function configure()
    {
        $this
            ->setDescription('Calculates age by using input date of birth, optionally checks if adult')
            ->addArgument('birthDate', InputArgument::OPTIONAL, 'Date of birth (Y-m-d format)')
            ->addOption('adult', null, InputOption::VALUE_NONE, 'Check if adult')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('birthDate');

        if ($arg1) {


            $time = strtotime($arg1);
            $newformat = new \DateTime($arg1);

            $age = (new Calculator($newformat))->calculate();



            $io->note(sprintf('Your age is: %s', $age));
        }

        if ($input->getOption('adult')) {
            $io->warning( 'Your option is not Adult');
            $io->success( 'Your option is Adult');
        }


    }
}
