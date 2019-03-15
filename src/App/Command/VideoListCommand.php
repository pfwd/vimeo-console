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
use PFWD\Vimeo\Hydrator\Type\Video as Hydrator;
use PFWD\Vimeo\URI\VideoURI;

/**
 * Class VideoListCommand
 */
class VideoListCommand extends AbstractVimeoCommand
{
    /**
     * @var VideoURI
     */
    private $uri;
    /**
     * @var string
     */
    protected static $defaultName = 'vimeo:video:list';

    public function __construct(VideoURI $uri, ?string $name = null)
    {
        $this->uri = $uri;

        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setDescription('List videos');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Vimeo\Exceptions\VimeoRequestException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $response = $this->getClient()->request($this->uri->getMyVideos(), [], 'GET');
        $dataSet = $response['body']['data'];

        foreach($dataSet as $data) {
            $hydrator = new Hydrator();
            $hydrator->hydrate($data);
            $video = $hydrator->getEntity();

            $output->writeln($video->getId() . ' '. $video->getName());
        }

    }
}