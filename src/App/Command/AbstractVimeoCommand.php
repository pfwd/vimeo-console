<?php
/**
 * Created by PhpStorm.
 * User: peterfisher
 * Date: 13/03/2019
 * Time: 20:32
 */
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Vimeo\Vimeo;

/**
 * Class AbstractVimeoCommand
 */
class AbstractVimeoCommand extends Command
{
    /**
     * @var Vimeo|null
     */
    private $client = null;

    /**
     * @return Vimeo
     */
    public function getClient():Vimeo
    {
        if (!$this->client instanceof Vimeo) {
            $this->client = new Vimeo(getenv('CLIENT_SECRET'), getenv('CLIENT_ID'), getenv('TOKEN'));
        }

        return $this->client;
    }
}