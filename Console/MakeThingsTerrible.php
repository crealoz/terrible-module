<?php

namespace Crealoz\TerribleModule\Console;

use Magento\Framework\App\Area;
use Magento\Framework\App\State;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Magento\User\Model\UserFactory;

class MakeThingsTerrible extends Command
{
    private UserFactory $userFactory;

    public function __construct(
        protected \Crealoz\TerribleModule\Model\Faq $faqModel,
        protected readonly State $state,
        UserFactory $userFactory
    ) {
        $this->userFactory = $userFactory;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('crealoz:terrible:things')
            ->setDescription('Make things terrible');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($this->state->getAreaCode() === Area::AREA_ADMINHTML) {

            $user = $this->userFactory->create();
            $user->setId(1);
        }
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
