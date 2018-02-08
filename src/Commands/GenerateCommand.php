<?php

namespace SteamWebApiGenerator\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateCommand extends Command
{
    protected $apiKey;

    protected $steamApi;

    protected $indexFile;

    protected function configure()
    {
        $this->setName("generate")
            ->setDescription("Generate the API doc")
            ->setDefinition([
                new InputOption('api-key', 'k', InputOption::VALUE_OPTIONAL, 'Web api key'),
            ]);
        
        $this->apiKey = env('API_KEY') ?: null;
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        parent::initialize($input, $output);

        if ($apiKey = $input->getOption('api-key')) {
            $this->apiKey = $apiKey;
        }

        $this->steamApi = new \crescentrose\Steam\SteamAPI($this->apiKey);

        $this->indexFile = $this->getApplication()->publicPath().DIRECTORY_SEPARATOR.'index.html';
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $response = $this->steamApi->ISteamWebAPIUtil->GetSupportedAPIList('v0001', [
            'format' => 'json'
        ]);

        if (empty($response->apilist->interfaces)) {
            throw new \ErrorException('Failed to get supported api list from Steam');
        }

        $this->getFilesystem()->put(
            $this->indexFile,
            $this->getView()->render('index', ['interfaces' => $response->apilist->interfaces])
        );

        $output->writeln('Successfully saved the docs to ' . $this->indexFile);
    }

    /**
     * @return \Windwalker\Renderer\BladeRenderer
     */
    protected function getView()
    {
        return $this->getApplication()->getView();
    }

    /**
     * @return \Illuminate\Filesystem\Filesystem
     */
    protected function getFilesystem()
    {
        return $this->getView()->getFilesystem();
    }
}