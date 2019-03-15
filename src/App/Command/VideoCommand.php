<?php
/**
 * Created by PhpStorm.
 * User: peterfisher
 * Date: 13/03/2019
 * Time: 20:32
 */
namespace App\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use PFWD\Vimeo\Hydrator\Type\Video as Hydrator;
use PFWD\Vimeo\URI\VideoURI;

/**
 * Class VideoCommand
 */
class VideoCommand extends AbstractVimeoCommand
{
    /**
     * @var VideoURI
     */
    private $uri;
    /**
     * @var string
     */
    protected static $defaultName = 'vimeo:video';

    public function __construct(VideoURI $uri, ?string $name = null)
    {
        $this->uri = $uri;

        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setDescription('Get video details')
            ->addArgument('id', InputArgument::REQUIRED, 'Video ID');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Vimeo\Exceptions\VimeoRequestException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $response = $this->getClient()->request($this->uri->getVideo($input->getArgument('id')), [], 'GET');
        $data = $response['body'];
        if($data) {
            $hydrator = new Hydrator();
            $hydrator->hydrate($data);
            $video = $hydrator->getEntity();

            $output->writeln([
                'Video Output',
                '--------------',
                'ID: '.$video->getId(),
                'Video: '.$video->getName(),
                'Description: '.$video->getDescription(),
                'Link: '.$video->getLink(),
                'Width: '.$video->getWidth(),
                'Height: '.$video->getHeight(),
                'Duration: '.$video->getDuration(),
                'Language: '.$video->getLanguage()
            ]);

        } else {
            $output->writeln('Cannot find video with ID: '.$input->getArgument('id'));
        }
    }
}