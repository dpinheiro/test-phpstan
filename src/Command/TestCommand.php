<?php

namespace App\Command;

use App\Model\Foo;
use App\Model\MyClass;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PropertyInfo\Extractor\ConstructorExtractor;

final class TestCommand extends Command
{
    protected static $defaultName = 'my:test';

    private ConstructorExtractor $extractor;

    public function __construct(ConstructorExtractor $extractor)
    {
        $this->extractor = $extractor;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Test')
            ->addArgument(
                'foo',
                InputArgument::REQUIRED,
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $foo = $input->getArgument('foo');

        dump($this->extractor->getTypes(Foo::class, 'bar'));

        return Command::SUCCESS;
    }
}
