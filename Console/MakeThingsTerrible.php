/**
 * EasyAudit Premium - Magento 2 Audit Extension
 *
 * Copyright (c) 2025 Crealoz. All rights reserved.
 * Licensed under the EasyAudit Premium EULA.
 *
 * This software is provided under a paid license and may not be redistributed,
 * modified, or reverse-engineered without explicit permission.
 * See EULA for details: https://crealoz.fr/easyaudit-eula
 */
<?php

namespace Crealoz\TerribleModule\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class MakeThingsTerrible extends Command
{
    public function __construct(
        protected \Crealoz\TerribleModule\Model\Faq $faqModel
    )
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('crealoz:terrible:things')
            ->setDescription('Make things terrible');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $questionHelper = $this->getHelper('question');
        $newQuestion = true;
        while ($newQuestion) {
            $questionQuestion = new Question('What is your terrible question?');
            $answerQuestion = new Question('What is your terrible answer?');
            $question = $questionHelper->ask($input, $output, $questionQuestion);
            $answer = $questionHelper->ask($input, $output, $answerQuestion);
            $this->faqModel->setData([
                'question' => $question,
                'answer' => $answer,
                'is_active' => 1
            ]);
            $this->faqModel->save();
            $output->writeln('Terrible question and answer saved.');

            $anotherQuestion = $questionHelper->ask($input, $output, 'Do you have another terrible question?');
            $newQuestion = $anotherQuestion === 'yes'|'y';
        }
    }
}
