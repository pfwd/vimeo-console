<?php
/**
 * Created by PhpStorm.
 * User: peterfisher
 * Date: 13/03/2019
 * Time: 20:32
 */
namespace App\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use PFWD\Vimeo\URI\ProjectURI;

/**
 * Class ProjectCommand
 */
class ProjectListCommand extends AbstractVimeoCommand
{
    private $uri;

    /**
     * @var string
     */
    protected static $defaultName = 'vimeo:project:list';

    public function __construct(ProjectURI $uri, ?string $name = null)
    {
        $this->uri = $uri;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setDescription('Gets all projects');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     *
     * @throws \Vimeo\Exceptions\VimeoRequestException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $response = $this->getClient()->request($this->uri->getMyProjects(), array(), 'GET');

        $output->writeln('This command does nothing');
    }
}