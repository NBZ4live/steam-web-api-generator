<?php

namespace SteamWebApiGenerator;

use Dotenv\Dotenv;
use SteamWebApiGenerator\Commands\GenerateCommand;
use Symfony\Component\Console\Application as BaseApplication;
use Windwalker\Renderer\BladeRenderer;

class Application extends BaseApplication
{
    const NAME = 'SWAG - Steam Web Api Generator';
    const VERSION = '1.0.0';

    protected $basePath;

    protected $dotenv;

    protected $environmentFile = '.env';

    protected $view;

    /**
     * Application constructor.
     * @param null $basePath
     */
    public function __construct($basePath = null)
    {
        parent::__construct(self::NAME, self::VERSION);

        $this->setBasePath($basePath);

        $this->loadEnvironment();

        $this->initializeRenderer();

        $command = new GenerateCommand();
        $this->add($command);
        
        $this->setDefaultCommand($command->getName(), true);
    }

    /**
     * Set the base path for the application.
     *
     * @param  string  $basePath
     * @return $this
     */
    public function setBasePath($basePath = null)
    {
        if (!$basePath) {
            $basePath = realpath(__DIR__.'/../');
        }

        $this->basePath = rtrim($basePath, '\/');

        return $this;
    }

    protected function loadEnvironment()
    {
        $this->dotenv = new Dotenv($this->basePath, $this->environmentFile);
        if (is_readable(rtrim($this->basePath, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$this->environmentFile)) {
            $this->dotenv->load();
        }
    }

    public function getView()
    {
        return $this->view;
    }

    protected function initializeRenderer()
    {
        $this->view = new BladeRenderer(
            [env('VIEWS_PATH', $this->viewsPath())],
            array('cache_path' => $this->cachePath())
        );
    }

    /**
     * Get the path to the resources directory.
     *
     * @return string
     */
    public function resourcePath()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'resources';
    }

    /**
     * Get the path to the views directory.
     *
     * @return string
     */
    public function viewsPath()
    {
        return $this->resourcePath().DIRECTORY_SEPARATOR.'views';
    }

    /**
     * Get the path to the cache directory.
     *
     * @return string
     */
    public function cachePath()
    {
        return $this->resourcePath().DIRECTORY_SEPARATOR.'cache';
    }

    public function publicPath()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'public';
    }
}