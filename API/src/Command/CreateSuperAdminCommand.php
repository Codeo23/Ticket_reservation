<?php

namespace App\Command;

use App\Entity\Client;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'create:super-admin',
    description: 'Create a super admin',
    aliases: ['create:super-admin'],
)]
class CreateSuperAdminCommand extends Command
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher, private EntityManagerInterface $em)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setHelp('Help you to create a super user')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $helper = $this->getHelper('question');

        $io->title('Create your own super user');
        $io->section('User Information.');
        
        $firstName = $helper->ask($input, $output, new Question('First Name: '));
        $lastName = $helper->ask($input, $output, new Question('Family Name: '));
        $email = $helper->ask($input, $output, new Question('Email Address: '));
        $password = $helper->ask($input, $output, (new Question('Password: '))->setHidden(true)->setHiddenFallback(false));
        $phoneNumber = $helper->ask($input, $output, new Question('Phone Number: '));
        $cardNumber = $helper->ask($input, $output, new Question('Card Number: '));

        $client = $this->em->getRepository(Client::class)->findBy(['email' => $email]);

        if($client){
            $io->error('User already exists !!!');
            return Command::INVALID;
        }

        $client = new Client;
        $client
            ->setCodeCli('C_'.$phoneNumber)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setEmail($email)
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->passwordHasher->hashPassword($client, $password))
            ->setTelephone($phoneNumber)
            ->setCardNumber($cardNumber)
        ;

        $io->section('Generating the User. Wait a minute ...');
        sleep(2000);

        $this->em->persist($client);
        $this->em->flush();

        $io->success('The super admin is successfully created');

        return Command::SUCCESS;
    }
}
